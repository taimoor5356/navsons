<template>
    <div v-if="isLoading || vendors.length" class="w-full lg:w-60 shrink-0 h-full flex flex-col">
        <div class="flex items-center justify-between mt-3 lg:mt-0 mb-2">
            <p class="text-sm font-bold text-slate-900">
                {{ $t("Our Partners") }}
            </p>
            <RouterLink
                v-if="hasMore"
                to="/shops"
                class="hidden lg:block text-primary text-xs font-medium hover:underline"
            >
                {{ $t("View all") }}
            </RouterLink>
        </div>

        <!-- mobile / tablet: horizontal scroll, no visible scrollbar -->
        <div
            class="flex lg:hidden items-center gap-2 overflow-x-auto scrollbar-hide"
        >
            <template v-if="!isLoading">
                <div
                    v-for="vendor in vendors"
                    :key="vendor.id"
                    class="shrink-0 w-14 h-14 rounded-lg border border-slate-100 flex items-center justify-center bg-white p-1.5"
                    :title="vendor.name"
                >
                    <img
                        :src="vendor.icon_image"
                        :alt="vendor.name"
                        loading="lazy"
                        class="w-full h-full object-contain rounded"
                    />
                </div>
            </template>

            <template v-else>
                <div v-for="i in 6" :key="i" class="shrink-0 w-14 h-14">
                    <SkeletonLoader class="w-full h-full rounded-lg" />
                </div>
            </template>
        </div>

        <!-- large screens: only show as many as fit -->
        <div
            ref="panelRef"
            class="hidden lg:grid grid-cols-2 content-start gap-2 flex-1 overflow-hidden"
        >
            <template v-if="!isLoading">
                <div
                    v-for="vendor in visibleVendors"
                    :key="vendor.id"
                    class="w-full h-24 rounded-lg border border-slate-100 flex items-center justify-center bg-white p-2"
                    :title="vendor.name"
                >
                    <img
                        :src="vendor.icon_image"
                        :alt="vendor.name"
                        loading="lazy"
                        class="w-full h-full object-contain rounded"
                    />
                </div>
            </template>

            <template v-else>
                <div v-for="i in 6" :key="i" class="w-full h-24">
                    <SkeletonLoader class="w-full h-full rounded-lg" />
                </div>
            </template>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount, nextTick } from "vue";
import axios from "axios";
import SkeletonLoader from "../SkeletonLoader.vue";

const CELL_HEIGHT = 96; // matches h-24
const ROW_GAP = 8; // matches gap-2
const COLUMNS = 2;

const panelRef = ref(null);
const maxVisible = ref(6);
const vendors = ref([]);
const isLoading = ref(true);
let observer;

const fetchVendors = async () => {
    isLoading.value = true;
    try {
        const response = await axios.get("/vendors");
        vendors.value = response.data.data.vendors;
    } catch (error) {
        vendors.value = [];
    } finally {
        isLoading.value = false;
        await nextTick();
        recalculate();
    }
};

const recalculate = () => {
    if (!panelRef.value) return;
    const availableHeight = panelRef.value.clientHeight;
    if (!availableHeight) return;
    const rows = Math.max(
        1,
        Math.floor((availableHeight + ROW_GAP) / (CELL_HEIGHT + ROW_GAP))
    );
    maxVisible.value = rows * COLUMNS;
};

onMounted(async () => {
    await fetchVendors();
    observer = new ResizeObserver(() => recalculate());
    if (panelRef.value) observer.observe(panelRef.value);
    window.addEventListener("resize", recalculate);
});

onBeforeUnmount(() => {
    observer?.disconnect();
    window.removeEventListener("resize", recalculate);
});

const hasMore = computed(() => vendors.value.length > maxVisible.value);

const visibleVendors = computed(() => {
    if (!hasMore.value) return vendors.value;
    return vendors.value.slice(0, maxVisible.value);
});
</script>
