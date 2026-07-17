<template>
    <div class="main-container py-6">
        <div class="prose max-w-none w-full" v-html="content?.description"></div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-6 mt-8 md:mt-10">
            <div
                v-for="feature in features"
                :key="feature.title"
                class="bg-slate-50 rounded-xl p-6"
            >
                <component :is="feature.icon" class="w-10 h-10 text-primary mb-4" />
                <div class="font-bold mb-2" style="color: #a20d32;">
                    {{ feature.title }}
                </div>
                <p class="text-slate-500 text-sm leading-relaxed">
                    {{ feature.description }}
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { TruckIcon, SparklesIcon, ChatBubbleLeftRightIcon } from '@heroicons/vue/24/outline';

const content = ref({});

const features = [
    {
        icon: TruckIcon,
        title: 'Fast, Reliable Delivery',
        description: 'Quick doorstep delivery across Islamabad, Rawalpindi and nearby areas, every single day.',
    },
    {
        icon: SparklesIcon,
        title: 'Freshness Guaranteed',
        description: 'Fresh fruits, vegetables, meat and dairy, carefully sourced and delivered the same day.',
    },
    {
        icon: ChatBubbleLeftRightIcon,
        title: 'Customer-First Support',
        description: 'A friendly, responsive team ready to help with your order, anytime you need us.',
    },
];

onMounted(() => {
    fetchData();
    window.scrollTo(0, 0);
});

const fetchData = () => {
    axios.get('/legal-pages/about-us').then((response) => {
        content.value = response.data.data.content;
    });
}

</script>
