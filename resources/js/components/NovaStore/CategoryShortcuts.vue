<template>
    <div class="main-container py-4">
        <div
            class="flex flex-nowrap items-start gap-2 md:gap-2 overflow-x-auto scrollbar-hide"
        >
            <template v-if="!isLoading">
                <div
                    v-for="(category, index) in categories"
                    :key="category.id"
                    class="shrink-0"
                    @mouseenter="openDropdown(index, $event)"
                    @mouseleave="scheduleClose"
                >
                    <div
                        class="rounded-[5px] cursor-pointer overflow-hidden"
                        style="width: 85px; height: 100%"
                        @click="goToCategory(category.id)"
                    >
                        <img
                            :src="category.thumbnail"
                            :alt="category.name"
                            loading="lazy"
                            class="w-full h-full object-cover"
                        />
                    </div>
                </div>
            </template>

            <!-- loading -->
            <template v-else>
                <div
                    v-for="i in 10"
                    :key="i"
                    class="shrink-0"
                    style="width: 75px; height: 75px"
                >
                    <SkeletonLoader class="w-full h-full rounded-[5px]" />
                </div>
            </template>
        </div>

        <!-- hover mega menu, large screens only. Teleported so the row's
             horizontal scroll container can't clip it vertically -->
        <Teleport to="body">
            <div
                v-if="hoveredIndex !== null"
                class="hidden lg:block fixed bg-white rounded-md shadow-xl border-b-4 overflow-hidden z-50 w-[640px] p-4"
                :style="{
                    top: dropdownPosition.top + 'px',
                    left: dropdownPosition.left + 'px',
                    borderBottomColor: '#0d2d6c',
                }"
                @mouseenter="keepOpen"
                @mouseleave="scheduleClose"
            >
                <p class="text-base font-bold text-slate-900 mb-3">
                    {{ categories[hoveredIndex].name }}
                </p>

                <div v-if="isProductsLoading" class="grid grid-cols-6 gap-3">
                    <div v-for="i in 6" :key="i" class="flex flex-col items-center gap-1">
                        <SkeletonLoader class="w-12 h-12 rounded-md" />
                    </div>
                </div>

                <div
                    v-else-if="hoveredProducts.length"
                    class="grid grid-cols-6 gap-3"
                >
                    <RouterLink
                        v-for="product in hoveredProducts"
                        :key="product.id"
                        :to="`/products/${product.slug}`"
                        class="flex flex-col items-center gap-1 cursor-pointer group"
                        @click="hoveredIndex = null"
                    >
                        <div
                            class="w-12 h-12 rounded-md flex items-center justify-center overflow-hidden"
                        >
                            <img
                                :src="product.thumbnail"
                                :alt="product.name"
                                loading="lazy"
                                class="w-full h-full object-contain"
                            />
                        </div>
                        <span
                            class="text-[10px] text-slate-600 text-center leading-tight group-hover:text-primary"
                        >
                            {{ product.name }}
                        </span>
                    </RouterLink>
                </div>

                <p v-else class="text-sm text-slate-500">
                    {{ $t("No products found") }}
                </p>
            </div>
        </Teleport>
    </div>
</template>

<script setup>
import { ref, onUnmounted } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import SkeletonLoader from "../SkeletonLoader.vue";

const router = useRouter();

const props = defineProps({
    categories: {
        type: Array,
        default: () => [],
    },
    isLoading: {
        type: Boolean,
        default: true,
    },
});

const hoveredIndex = ref(null);
const dropdownPosition = ref({ top: 0, left: 0 });
let closeTimer = null;

const DROPDOWN_WIDTH = 640;

const productsByCategory = ref({});
const hoveredProducts = ref([]);
const isProductsLoading = ref(false);
let requestToken = 0;

const fetchCategoryProducts = async (categoryId) => {
    if (productsByCategory.value[categoryId]) {
        hoveredProducts.value = productsByCategory.value[categoryId];
        isProductsLoading.value = false;
        return;
    }

    isProductsLoading.value = true;
    hoveredProducts.value = [];

    const token = ++requestToken;
    try {
        const response = await axios.get("/category-products", {
            params: {
                category_id: categoryId,
                page: 1,
                per_page: 18,
            },
        });

        if (token !== requestToken) return;

        const products = response.data.data.products;
        productsByCategory.value[categoryId] = products;
        hoveredProducts.value = products;
    } catch (error) {
        if (token !== requestToken) return;
        hoveredProducts.value = [];
    } finally {
        if (token === requestToken) {
            isProductsLoading.value = false;
        }
    }
};

const openDropdown = (index, event) => {
    clearTimeout(closeTimer);
    hoveredIndex.value = index;

    const rect = event.currentTarget.getBoundingClientRect();
    let left = rect.left;
    const maxLeft = window.innerWidth - DROPDOWN_WIDTH - 16;
    if (left > maxLeft) {
        left = Math.max(16, maxLeft);
    }

    dropdownPosition.value = { top: rect.bottom + 8, left };

    fetchCategoryProducts(props.categories[index].id);
};

const keepOpen = () => {
    clearTimeout(closeTimer);
};

const scheduleClose = () => {
    clearTimeout(closeTimer);
    closeTimer = setTimeout(() => {
        hoveredIndex.value = null;
    }, 150);
};

onUnmounted(() => {
    clearTimeout(closeTimer);
});

const goToCategory = (id) => {
    hoveredIndex.value = null;
    router.push(`/categories/${id}`);
};
</script>
