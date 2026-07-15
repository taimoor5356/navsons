<template>
    <div>
        <div class="border-b border-slate-100">
            <CategoryShortcuts :categories="categories" :isLoading="isLoadingCategory" />
        </div>
        <div class="border-b border-slate-100">
            <HeroBanner
                :banners="banners"
                :ads="ads"
                :isLoading="isLoading"
            />
        </div>
        <!-- <Marketing /> -->
        <div class="border-b border-slate-100">
            <PopularProducts :tabs="popularProducts" />
        </div>
        <!-- <Categories :categories="categories" :isLoading="isLoadingCategory" /> -->
        <div class="border-b border-slate-100">
            <FullWidthBannerCarousel />
        </div>
        <div class="border-b border-slate-100">
            <ProductShowcase :title="'Top Offers'" sortType="low_to_high" :hasDiscount="true" />
        </div>
        <div class="border-b border-slate-100">
            <ProductShowcase :title="'Top Blooms'" sortType="popular_product" categoryName="Flowers" />
        </div>
        <div class="border-b border-slate-100">
            <FullWidthBannerCarousel />
        </div>
        <div class="border-b border-slate-100">
            <ProductShowcase :title="'New in Season'" sortType="newest" :createdWithinDays="30" />
        </div>
        <div class="border-b border-slate-100">
            <JustForYou :justForYou="justForYou" :isLoading="isLoading" />
        </div>
        <div class="border-b border-slate-100">
            <FullWidthBannerCarousel />
        </div>

        <div v-if="incomingFlashSale.length > 0" class="border-b border-slate-100">
            <FlashSaleIncoming
                v-for="incomingFlash in incomingFlashSale"
                :flashSale="incomingFlash"
            />
        </div>
        <div v-if="runningFlashSale.length > 0" class="border-b border-slate-100">
            <FlashSaleRunning
                v-for="flashSale in runningFlashSale"
                :flashSale="flashSale"
            />
        </div>
        <div class="border-b border-slate-100">
            <OfferBanners />
        </div>
        <div v-if="master.getMultiVendor">
            <TopRatedShops :shops="topRatedShops" :isLoading="isLoading" />
        </div>
    </div>
</template>

<script setup>
import Categories from "../NovaStore/Categories.vue";
import CategoryShortcuts from "../NovaStore/CategoryShortcuts.vue";
import Marketing from "../NovaStore/Marketing.vue";
import FlashSaleIncoming from "../NovaStore/FlashSaleIncoming.vue";
import OfferBanners from "../NovaStore/OfferBanners.vue";
import HeroBanner from "../NovaStore/HeroBanner.vue";
import FlashSaleRunning from "../NovaStore/FlashSaleRunning.vue";
import PopularProducts from "../NovaStore/PopularProducts.vue";
import TopRatedShops from "../NovaStore/TopRatedShops.vue";
import JustForYou from "../NovaStore/JustForYou.vue";
import ProductShowcase from "../NovaStore/ProductShowcase.vue";
import FullWidthBannerCarousel from "../NovaStore/FullWidthBannerCarousel.vue";
import { useMaster } from "../../stores/MasterStore";

defineProps({
    banners: {
        type: Array,
        default: [],
    },
    categories: {
        type: Array,
        default: [],
    },
    incomingFlashSale: {
        type: Array,
        default: [],
    },
    runningFlashSale: {
        type: Array,
        default: [],
    },
    popularProducts: {
        type: Array,
        default: [],
    },
    topRatedShops: {
        type: Array,
        default: [],
    },
    justForYou: {
        type: Array,
        default: [],
    },
    recentlyViewProducts: {
        type: Array,
        default: [],
    },
    ads: {
        type: Array,
        default: [],
    },
    isLoading: {
        type: Boolean,
        default: true,
    },
    isLoadingCategory: {
        type: Boolean,
        default: true,
    },
});

const master = useMaster();
</script>

