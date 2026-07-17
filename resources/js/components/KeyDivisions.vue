<template>
    <div class="main-container pt-10 md:pt-14">
        <SectionRibbon text="Key Divisions" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mt-6">
            <div
                v-for="division in divisions"
                :key="division.title"
                class="bg-slate-50 rounded-xl overflow-hidden"
            >
                <img
                    :src="division.image"
                    :alt="division.title"
                    class="w-full h-40 object-cover"
                    loading="lazy"
                />
                <div class="p-5">
                    <div class="font-bold text-primary mb-2">
                        {{ division.title }}
                    </div>
                    <p class="text-slate-500 text-sm leading-relaxed line-clamp-3">
                        {{ division.description }}
                    </p>
                    <RouterLink
                        :to="division.to"
                        class="inline-block mt-3 text-sm font-semibold"
                        style="color: #a20d32;"
                    >
                        Read More
                    </RouterLink>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { RouterLink } from 'vue-router';
import SectionRibbon from './SectionRibbon.vue';

const divisions = [
    {
        title: 'Fresh Produce',
        image: '/storage/files/1/fruits.png',
        description: 'Hand-picked fresh fruits and vegetables, sourced daily and delivered straight to your kitchen.',
        to: '/categories',
    },
    {
        title: 'Meat & Seafood',
        image: '/storage/files/1/meat.png',
        description: 'Quality meat, poultry and seafood, carefully selected and prepared to the highest hygiene standards.',
        to: '/categories',
    },
    {
        title: 'Dairy & Bakery',
        image: '/storage/files/1/dairy.png',
        description: 'Fresh dairy products and bakery essentials to complete your everyday grocery list.',
        to: '/categories',
    },
    {
        title: 'Online Delivery',
        image: '/assets/images/homepage/online-shopping.png',
        description: 'Order anytime through our website, with fast, reliable delivery across Islamabad and Rawalpindi.',
        to: '/products',
    },
];
</script>
