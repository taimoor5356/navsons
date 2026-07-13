<template>
    <SectionContainer :title="'Products'" :isLoading="isLoading" class="!pt-0 !pb-2 !px-4">
        <template #button>
            <div class="flex justify-center items-center gap-4">
                <ViewAllBtn link="/most-popular" />
            </div>
        </template>
        <template #tabs>
            <div class="pt-4">

                <section v-if="!isLoading">
                    <swiper
                        :slides-per-view="'auto'"
                        :space-between="12"
                        :free-mode="true"
                        :mousewheel="true"
                        ref="swiperRef"
                        @swiper="onSwiper"
                        :modules="modules"
                        :breakpoints="tabBreakpoints"
                        class=""
                    >
                        <swiper-slide :key="0" class="!w-auto">
                            <button
                                class="flex flex-col items-center gap-1"
                                @click="getProductsByCategory()"
                            >
                                <span
                                    class="w-14 h-14 md:w-16 md:h-16 rounded-full overflow-hidden border-2 flex items-center justify-center bg-neutral-100 transition-all duration-200"
                                    :class="currentTab == 'all' ? 'border-primary-500' : 'border-transparent'"
                                >
                                    <StorefrontIcon class="w-6 h-6" colorClass="text-primary" />
                                </span>
                                <span
                                    class="text-xs font-medium capitalize"
                                    :class="currentTab == 'all' ? 'text-primary-500' : 'text-slate-600'"
                                >
                                    {{ $t("all") }}
                                </span>
                            </button>
                        </swiper-slide>

                        <swiper-slide
                            v-for="tab in tabs"
                            :key="tab.id"
                            class="!w-auto"
                        >
                            <button
                                class="flex flex-col items-center gap-1"
                                @click="getProductsByCategory(tab.id)"
                            >
                                <span
                                    class="w-14 h-14 md:w-16 md:h-16 rounded-full overflow-hidden border-2 flex items-center justify-center bg-neutral-100 transition-all duration-200"
                                    :class="tab.id == currentTab ? 'border-primary-500' : 'border-transparent'"
                                >
                                    <img
                                        :src="tab.thumbnail"
                                        :alt="tab.name"
                                        loading="lazy"
                                        class="w-full h-full object-cover"
                                    />
                                </span>
                                <span
                                    class="text-xs font-medium capitalize truncate max-w-[4.5rem]"
                                    :class="tab.id == currentTab ? 'text-primary-500' : 'text-slate-600'"
                                >
                                    {{ tab.name }}
                                </span>
                            </button>
                        </swiper-slide>
                    </swiper>
                </section>

                <section
                    v-else
                    class="flex justify-start gap-4 flex-nowrap overflow-x-auto scrollbar-hide"
                >
                    <div v-for="i in 6" :key="i" class="flex flex-col items-center gap-1">
                        <SkeletonLoader class="w-14 h-14 md:w-16 md:h-16 rounded-full" />
                        <SkeletonLoader class="w-12 h-3 rounded" />
                    </div>
                </section>
            </div>
        </template>

        <div>
            <section class="hidden lg:grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-6 mt-[32px]">
                <p
                    v-if="!isCategoryProductLoading && products.length == 0"
                    class="col-span-full text-center text-primary"
                >
                    No products to show
                </p>
                <div
                    v-if="!isCategoryProductLoading"
                    v-for="product in products"
                    :key="product.id"
                    class="w-full"
                >
                    <ProductCard :product="product" />
                </div>

                <!-- loading -->
                <div v-else v-for="i in 6" :key="i">
                    <SkeletonLoader class="w-full h-[220px] sm:h-[330px]" />
                </div>
            </section>

            <!-- slider  -->
            <section
                :dir="master.langDirection || 'ltr'"
                class="block lg:hidden"
            >
                <swiper
                    :breakpoints="breakpoints"
                    :loop="true"
                    ref="swiperRef"
                    @swiper="onSwiper"
                    :modules="modules"
                    :pagination="{ clickable: true }"
                    class="popular_swiper green_bullet"
                    :autoplay="{
                        delay: 4000,
                        disableOnInteraction: false,
                    }"
                >
                    <swiper-slide
                        v-if="!isCategoryProductLoading"
                        v-for="product in products"
                        :key="product.id"
                    >
                        <div class="mb-8">
                            <ProductCard :product="product" />
                        </div>
                    </swiper-slide>

                    <!-- loading -->
                    <swiper-slide v-else v-for="i in 8" :key="i">
                        <SkeletonLoader class="w-full h-[250px] rounded-lg" />
                    </swiper-slide>
                </swiper>
            </section>

            <!-- Show More Products -->
            <div
                v-if="!isCategoryProductLoading"
                class="mt-4 md:mt-[30px] w-full flex justify-center"
            >
                <button
                    v-if="hasMoreProducts && !loadMore"
                    class="max-w-96 w-full max-h-12 md:max-h-14 px-6 py-4 rounded-[10px] border border-primary text-primary text-lg font-medium font-['Lato'] leading-relaxed inline-flex justify-center items-center gap-2.5 transition-all duration-300 group hover:bg-primary hover:text-white"
                    @click="loadMoreProducts()"
                >
                    <span>{{ $t("Show More Products") }}</span>
                </button>

                <button
                    v-if="loadMore"
                    class="md:max-w-[450px] w-full px-[23px] py-[15px] rounded-[10px] border border-primary-200 text-primary flex items-center justify-center cursor-not-allowed text-primary text-base font-medium leading-6 transition-all duration-300 group hover:bg-primary hover:text-white"
                    disabled
                >
                    <svg
                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-primary"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <circle
                            class="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="4"
                        ></circle>
                        <path
                            class="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                        ></path>
                    </svg>
                    {{ $t("Loading products") }}...
                </button>
            </div>
        </div>
    </SectionContainer>
</template>

<script setup>
import ProductCard from "../NovaStore/ProductCard.vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import {
    Navigation,
    Pagination,
    A11y,
    Autoplay,
    FreeMode,
} from "swiper/modules";
import SkeletonLoader from "../SkeletonLoader.vue";
import SectionContainer from "../SectionContainer.vue";
import { computed, onMounted, ref } from "vue";
import axios from "axios";
import { useAuth } from "../../stores/AuthStore";
import { useMaster } from "../../stores/MasterStore";
import ViewAllBtn from "../ViewAllBtn.vue";
import StorefrontIcon from "../../icons/StorefrontIcon.vue";

import "swiper/css";
import "swiper/css/free-mode";

const props = defineProps({
    tabs: {
        type: Array,
        default: [],
    },
});

// apis
const popularProductsApi = "/popular-products";

// store
const authStore = useAuth();
const master = useMaster();

// variables
const products = ref([]);
const currentTab = ref("");
const currentCategoryId = ref("");
const currentPage = ref(1);
const perPage = 12;
const totalProducts = ref(0);
const loadMore = ref(false);

const isLoading = ref(true);
const isCategoryProductLoading = ref(true);

const hasMoreProducts = computed(() => products.value.length < totalProducts.value);

// slider module
const modules = [Navigation, Pagination, A11y, Autoplay, FreeMode];

const swiperInstance = ref();

function onSwiper(swiper) {
    swiperInstance.value = swiper;
}

const swiperNextSlide = () => {
    swiperInstance.value.slideNext();
};

const swiperPrevSlide = () => {
    swiperInstance.value.slidePrev();
};

const breakpoints = {
    320: {
        slidesPerView: 1.3,
        spaceBetween: 8,
    },
    540: {
        slidesPerView: 2.2,
        spaceBetween: 12,
    },
    712: {
        slidesPerView: 2.5,
        spaceBetween: 12,
    },
    768: {
        slidesPerView: 2.5,
        spaceBetween: 12,
    },
    1024: {
        slidesPerView: 6,
        spaceBetween: 20,
    },
};

const tabBreakpoints = {
    320: {
        spaceBetween: 24,
    },
    768: {
        spaceBetween: 24,
    },
    1024: {
        spaceBetween: 24,
    },
};

// functions
const fetchProducts = ({ append = false } = {}) => {
    axios
        .get(popularProductsApi, {
            params: {
                category_id: currentCategoryId.value || undefined,
                page: currentPage.value,
                per_page: perPage,
            },
            headers: {
                Authorization: authStore.token,
            },
        })
        .then((response) => {
            const newProducts = response.data.data.popular_products;
            totalProducts.value = response.data.data.total;
            products.value = append
                ? products.value.concat(newProducts)
                : newProducts;
        })
        .finally(() => {
            isLoading.value = false;
            isCategoryProductLoading.value = false;
            loadMore.value = false;
        });
};

const getProductsByCategory = (categoryId = "") => {
    isCategoryProductLoading.value = true;
    currentTab.value = categoryId == "" ? "all" : categoryId;
    currentCategoryId.value = categoryId;
    currentPage.value = 1;
    fetchProducts({ append: false });
};

const getAllProducts = () => {
    isLoading.value = true;
    isCategoryProductLoading.value = true;
    currentTab.value = "all";
    currentCategoryId.value = "";
    currentPage.value = 1;
    fetchProducts({ append: false });
};

const loadMoreProducts = () => {
    loadMore.value = true;
    currentPage.value++;
    fetchProducts({ append: true });
};

// onMounted
onMounted(() => {
    getAllProducts();
});
</script>

<style scoped>
/* markup assumption:
   <button class="tab_links">Tab</button>
   <button class="tab_links tab_link_active">Active tab</button>
*/

.popular_swiper .swiper-button-prev,
.popular_swiper .swiper-button-next {
    position: absolute;
    width: 40px;
    height: 40px;
    background-color: #fff;
    color: #475569 !important;
    border-radius: 8px !important;
    margin-top: auto;
}

.popular_swiper .swiper-button-next {
    left: auto;
    right: 20px;
    bottom: 20px;
}

.popular_swiper .swiper-button-prev {
    left: auto;
    right: 70px;
    bottom: 20px;
}

.popular_swiper .swiper-button-prev:after,
.popular_swiper .swiper-button-next:after {
    color: black;
    font-size: 12px !important;
    font-weight: bolder;
}

</style>
