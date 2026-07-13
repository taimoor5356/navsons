<script setup>
import SkeletonLoader from "./SkeletonLoader.vue";

const props = defineProps({
    title: String,
    isLoading: {
        type: Boolean,
        default: true,
    },
});
</script>

<template>
    <section class="container-3">
        <div v-if="!isLoading" class="mb-4 lg:mb-8">
            <div class="flex justify-between items-center gap-4 flex-wrap">
                <div
                    class="text-[#0d2d6c] text-base lg:text-xl font-semibold font-['Lato'] lg:font-['Inter'] leading-6 lg:leading-7"
                >
                    {{ $t(title) }}
                </div>

                <slot name="button"></slot>
            </div>

            <slot name="tabs"></slot>
        </div>

        <!-- loading -->
        <SkeletonLoader
            v-else
            class="w-48 sm:w-60 md:w-72 lg:w-96 h-12 rounded-lg mb-8"
        />

        <slot />
    </section>
</template>
