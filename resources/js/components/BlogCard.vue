<template>
    <div
        class="group bg-white overflow-hidden cursor-pointer transition-shadow duration-300 hover:shadow-xl"
        @click="goToBlogDetails()"
    >
        <div class="w-full h-56 overflow-hidden relative">
            <img
                :src="blog?.thumbnail"
                class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110"
                loading="lazy"
            />
            <div
                v-if="blog?.is_new"
                class="text-white px-2 py-0.5 text-xs font-semibold absolute top-2 left-2"
                style="background-color: #a20d32;"
            >
                {{ $t('New') }}
            </div>
        </div>

        <div class="pt-4">
            <div class="text-slate-400 text-xs">
                {{ blog?.created_at }} <span v-if="blog?.post_by?.name">· {{ blog?.post_by?.name }}</span>
            </div>

            <div
                class="text-lg font-bold mt-1.5 transition-colors duration-300 line-clamp-2"
                :style="{ color: '#0d2d6c' }"
            >
                {{ blog?.title }}
            </div>

            <p class="text-slate-500 text-sm mt-2 leading-relaxed line-clamp-2">
                {{ blog?.description }}
            </p>

            <div
                class="inline-flex items-center gap-1.5 text-sm font-semibold mt-3 transition-all duration-300 group-hover:gap-2.5"
                style="color: #a20d32;"
            >
                {{ $t('Read more') }}
                <ArrowRightIcon class="w-3.5 h-3.5" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router';
import { ArrowRightIcon } from '@heroicons/vue/24/outline';

const router = useRouter();

const props = defineProps({
    blog: Object
});

const goToBlogDetails = () => {
    router.push('/blog/' + props.blog?.slug);
}
</script>
