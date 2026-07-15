<template>
    <div v-if="banners.length" class="main-container pb-2 !px-4">
        <swiper
            :loop="banners.length > 1"
            :modules="modules"
            :pagination="{ clickable: true }"
            :autoplay="{ delay: 4000, disableOnInteraction: false }"
            class="w-full rounded-lg overflow-hidden banner_carousel green_bullet"
        >
            <swiper-slide v-for="(banner, index) in banners" :key="index">
                <component
                    :is="banner.link ? 'a' : 'div'"
                    :href="banner.link || undefined"
                    class="block w-full"
                >
                    <img
                        :src="banner.offer_banner"
                        alt=""
                        loading="lazy"
                        class="w-full h-auto max-h-[220px] lg:max-h-[320px] object-cover"
                    />
                </component>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Pagination, Autoplay } from "swiper/modules";
import { useMaster } from "../../stores/MasterStore";

import "swiper/css";
import "swiper/css/pagination";

const master = useMaster();
const modules = [Pagination, Autoplay];

const banners = computed(() => (master.offerBanners || []).slice(0, 4));
</script>

<style scoped>
.banner_carousel .swiper-pagination-bullet {
    background: white;
    opacity: 1;
    @apply h-2 w-2 rounded-lg transition-all duration-200;
}

.banner_carousel .swiper-pagination-bullet-active {
    @apply bg-primary w-6 rounded-lg transition-all duration-200;
}
</style>
