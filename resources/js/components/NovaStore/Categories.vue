<template>
    <SectionContainer :title="'Featured Categories'" :isLoading="isLoading">
        <template #button>
            <div class="flex justify-center items-center gap-4">
                <router-link
                    to="/categories"
                    class="text-primary text-base md:text-lg font-normal leading-normal"
                >
                    {{ $t("View All") }}
                </router-link>

                <div
                    class="hidden gap-3"
                    :class="
                        master.langDirection == 'rtl'
                            ? 'md:flex justify-center items-center flex-row-reverse'
                            : 'md:flex justify-center items-center'
                    "
                >
                    <button
                        class="w-8 h-8 rounded-lg justify-center items-center gap-2 flex bg-green-100/50 transition-all duration-200 hover:bg-primary group"
                        @click="swiperPrevSlide"
                    >
                        <ChevronLeftIcon
                            class="w-6 h-6 text-slate-600 group-hover:text-white"
                        />
                    </button>
                    <button
                        class="w-8 h-8 rounded-lg justify-center items-center gap-2 flex bg-green-100/50 transition-all duration-200 hover:bg-primary group"
                        @click="swiperNextSlide"
                    >
                        <ChevronRightIcon
                            class="w-6 h-6 text-slate-600 group-hover:text-white"
                        />
                    </button>
                </div>
            </div>
        </template>

        <div :dir="master.langDirection || 'ltr'">
            <swiper
                :breakpoints="breakpoints"
                :loop="false"
                :pagination="{ clickable: true }"
                ref="swiperRef"
                @swiper="onSwiper"
                :modules="modules"
                class="green_bullet"
            >
                <swiper-slide
                    v-if="!isLoading"
                    v-for="category in categories"
                    :key="category.id"
                    class="mb-8"
                >
                    <CategoryCard :category="category" />
                </swiper-slide>

                <!-- loading -->
                <swiper-slide v-else v-for="i in 8" :key="i" class="mb-8">
                    <div class="flex flex-col items-center gap-2">
                        <SkeletonLoader class="w-16 h-16 md:w-20 md:h-20 rounded-full" />
                        <SkeletonLoader class="w-12 h-3 rounded" />
                    </div>
                </swiper-slide>
            </swiper>
        </div>
    </SectionContainer>
</template>

<script setup>
import { ref } from "vue";
import { ChevronLeftIcon, ChevronRightIcon } from "@heroicons/vue/20/solid";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination, A11y, Autoplay } from "swiper/modules";
import CategoryCard from "../NovaStore/CategoryCard.vue"
import SkeletonLoader from "../SkeletonLoader.vue";
import { useMaster } from "../../stores/MasterStore";

import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import SectionContainer from "../SectionContainer.vue";

const props = defineProps({
    categories: Array,
    isLoading: {
        type: Boolean,
        default: true,
    },
});

const master = useMaster();

// slider module
const modules = [Navigation, Pagination, A11y, Autoplay];

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
        slidesPerView: 4,
        spaceBetween: 10,
    },
    540: {
        slidesPerView: 5,
        spaceBetween: 10,
    },
    712: {
        slidesPerView: 6,
        spaceBetween: 10,
    },
    768: {
        slidesPerView: 8,
        spaceBetween: 10,
    },
    1024: {
        slidesPerView: 10,
        spaceBetween: 20,
    },
};
</script>

<style lang="scss" scoped></style>
