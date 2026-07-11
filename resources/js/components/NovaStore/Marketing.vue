<template>
    <SectionContainer :title="'Marketing'" :isLoading="false">
        <template #button>
            <div class="flex justify-center items-center gap-4">
                <!-- <router-link
                    to="/categories"
                    class="text-primary text-base md:text-lg font-normal leading-normal"
                >
                    View All
                </router-link> -->

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
                @swiper="onSwiper"
                :modules="modules"
                class="green_bullet"
            >
                <swiper-slide
                    v-for="category in categories"
                    :key="category.id"
                    class="mb-8"
                >
                <div
                    class="bg-white rounded-xl hover:shadow-md transition-all duration-300"
                >
                    <div class="w-full flex items-center justify-center overflow-hidden">
                        <img
                            :src="category.image"
                            :alt="category.name"
                            class="max-h-full max-w-full object-contain rounded-lg"
                        />
                    </div>
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
import { useMaster } from "../../stores/MasterStore";
import SectionContainer from "../SectionContainer.vue";

import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

const master = useMaster();

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

// Hardcoded Categories
const categories = [
    {
        id: 1,
        name: "Fresh Fruits",
        image: "https://navsons.com/storage/files/1/buy_bulk_save_more.png?timestamp=1777554089",
    },
    {
        id: 2,
        name: "Vegetables",
        image: "https://navsons.com/storage/files/1/free_same_day_delivery.png?timestamp=1777554275",
    },
    {
        id: 3,
        name: "Meat",
        image: "https://navsons.com/storage/files/1/navsons_marketing_banner.png?timestamp=1777554120",
    },
    {
        id: 4,
        name: "Sea Food",
        image: "https://navsons.com/storage/files/1/loyalty_points.png?timestamp=1777554307",
    },
    {
        id: 5,
        name: "Bakery",
        image: "https://navsons.com/storage/files/1/sustainable_grocery_shopping.png?timestamp=1777554421",
    }
];

const breakpoints = {
    320: {
        slidesPerView: 2,
        spaceBetween: 20,
    },
    540: {
        slidesPerView: 2,
        spaceBetween: 20,
    },
    712: {
        slidesPerView: 3,
        spaceBetween: 20,
    },
    768: {
        slidesPerView: 4,
        spaceBetween: 20,
    },
    1024: {
        slidesPerView: 5,
        spaceBetween: 20,
    },
};
</script>

<style scoped></style>