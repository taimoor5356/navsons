<template>
    <Teleport to="body">
        <Transition name="global-loader-fade">
            <div
                v-if="loaderStore.pageLoading"
                class="fixed inset-0 z-[99999] flex items-center justify-center bg-white/30 backdrop-blur-sm"
            >
                <img
                    src="https://navsons.com/storage/files/1/2-Photoroom.png?timestamp=1778706157"
                    alt="Loading"
                    class="w-16 h-16 md:w-20 md:h-20 global-loader-spin"
                />
            </div>
        </Transition>
    </Teleport>
</template>

<script setup>
import { useLoaderStore } from "../stores/LoaderStore";

const loaderStore = useLoaderStore();
</script>

<style scoped>
.global-loader-spin {
    animation: global-loader-rotate-y 1.2s linear infinite;
    transform-style: preserve-3d;
}

@keyframes global-loader-rotate-y {
    from {
        transform: rotateY(0deg);
    }
    to {
        transform: rotateY(360deg);
    }
}

.global-loader-fade-enter-active,
.global-loader-fade-leave-active {
    transition: opacity 0.2s ease;
}

.global-loader-fade-enter-from,
.global-loader-fade-leave-to {
    opacity: 0;
}
</style>
