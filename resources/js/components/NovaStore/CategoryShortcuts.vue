<template>
    <div class="main-container pb-2 !px-4">
        <div
            ref="scrollContainer"
            class="flex flex-nowrap items-start gap-2 md:gap-2 overflow-x-auto scrollbar-hide select-none lg:cursor-grab"
            @mousedown="onMouseDown"
            @mousemove="onMouseMove"
            @mouseup="onMouseUp"
            @mouseleave="onContainerMouseLeave"
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
                        style="width: 75px; height: 100%"
                        @click="goToCategory(category.id)"
                    >
                        <img
                            :src="category.icon_image"
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
                class="hidden lg:block fixed bg-white rounded-md shadow-xl border-b-4 overflow-hidden z-50 p-4"
                :style="{
                    top: dropdownPosition.top + 'px',
                    left: dropdownPosition.left + 'px',
                    width: dropdownWidth + 'px',
                    borderBottomColor: '#0d2d6c',
                }"
                @mouseenter="keepOpen"
                @mouseleave="scheduleClose"
            >
                <p class="text-base font-bold text-slate-900 mb-3">
                    {{ categories[hoveredIndex].name }}
                </p>

                <div class="grid grid-cols-12 gap-4 h-56">
                    <div class="col-span-8 overflow-y-auto">
                        <div v-if="isProductsLoading" class="grid grid-cols-4 gap-3">
                            <div v-for="i in 8" :key="i" class="flex flex-col items-center gap-1">
                                <SkeletonLoader class="w-12 h-12 rounded-md" />
                            </div>
                        </div>

                        <div
                            v-else-if="hoveredProducts.length"
                            class="grid grid-cols-4 gap-3"
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

                    <div class="col-span-4 h-full">
                        <RouterLink
                            :to="`/categories/${categories[hoveredIndex].id}`"
                            class="flex w-full h-full rounded-md overflow-hidden bg-slate-50 items-center justify-center"
                            @click="hoveredIndex = null"
                        >
                            <img
                                :src="categories[hoveredIndex].thumbnail"
                                :alt="categories[hoveredIndex].name"
                                class="max-w-full max-h-40 object-contain"
                            />
                        </RouterLink>
                    </div>
                </div>
            </div>
        </Teleport>
    </div>
</template>

<script setup>
import { ref, onUnmounted, watch } from "vue";
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

const scrollContainer = ref(null);
let isDragging = false;
let dragMoved = false;
let dragStartX = 0;
let dragStartScrollLeft = 0;

const onMouseDown = (e) => {
    const el = scrollContainer.value;
    if (!el) return;
    isDragging = true;
    dragMoved = false;
    dragStartX = e.pageX - el.offsetLeft;
    dragStartScrollLeft = el.scrollLeft;
};

const onMouseMove = (e) => {
    if (!isDragging || !scrollContainer.value) return;
    e.preventDefault();
    const el = scrollContainer.value;
    const x = e.pageX - el.offsetLeft;
    const walk = x - dragStartX;
    if (Math.abs(walk) > 5) dragMoved = true;
    el.scrollLeft = dragStartScrollLeft - walk;
};

const stopDragging = () => {
    isDragging = false;
};

const onMouseUp = () => {
    stopDragging();
};

const onContainerMouseLeave = () => {
    stopDragging();
};

const DROPDOWN_MAX_WIDTH = 1280;
const DROPDOWN_MARGIN = 16;

const dropdownWidth = ref(DROPDOWN_MAX_WIDTH);
const productsByCategory = ref({});
const hoveredProducts = ref([]);
const isProductsLoading = ref(false);
const categoryFetchPromises = {};

// preload every category's products up front so the dropdown has data
// ready the moment the user hovers, instead of fetching on hover
const loadCategoryProducts = (categoryId) => {
    if (productsByCategory.value[categoryId]) {
        return Promise.resolve(productsByCategory.value[categoryId]);
    }

    if (!categoryFetchPromises[categoryId]) {
        categoryFetchPromises[categoryId] = axios
            .get("/category-products", {
                params: {
                    category_id: categoryId,
                    page: 1,
                    per_page: 12,
                },
            })
            .then((response) => {
                const products = response.data.data.products;
                productsByCategory.value[categoryId] = products;
                return products;
            })
            .catch(() => {
                delete categoryFetchPromises[categoryId];
                return [];
            });
    }

    return categoryFetchPromises[categoryId];
};

watch(
    () => props.categories,
    (categories) => {
        categories?.forEach((category) => loadCategoryProducts(category.id));
    },
    { immediate: true }
);

const openDropdown = (index, event) => {
    clearTimeout(closeTimer);
    hoveredIndex.value = index;

    const viewportWidth = window.innerWidth;
    const width = Math.min(
        DROPDOWN_MAX_WIDTH,
        viewportWidth - DROPDOWN_MARGIN * 2
    );
    dropdownWidth.value = width;

    const rect = event.currentTarget.getBoundingClientRect();
    const left = Math.max(DROPDOWN_MARGIN, (viewportWidth - width) / 2);

    dropdownPosition.value = { top: rect.bottom + 8, left };

    const categoryId = props.categories[index].id;
    const cached = productsByCategory.value[categoryId];
    if (cached) {
        hoveredProducts.value = cached;
        isProductsLoading.value = false;
        return;
    }

    isProductsLoading.value = true;
    hoveredProducts.value = [];
    loadCategoryProducts(categoryId).then((products) => {
        if (hoveredIndex.value !== index) return;
        hoveredProducts.value = products;
        isProductsLoading.value = false;
    });
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
    if (dragMoved) return;
    hoveredIndex.value = null;
    router.push(`/categories/${id}`);
};
</script>
