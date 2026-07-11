<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        :width="width"
        :height="height"
        :class="colorClass"
        viewBox="0 0 24 24"
        fill="none"
    >
        <path
            d="M10 9V22H14V9C14 7.5 14 6.5 16.5 6.5H18V3.2C17.6 3.15 16.4 3 15.2 3C12.6 3 10 4.6 10 8.5V9Z"
            fill="currentColor"
        />
        <path d="M7 10H17V13.5H7V10Z" fill="currentColor" />
    </svg>
</template>

<script setup>
const props = defineProps({
    colorClass: {
        type: String,
        default: "fill-primary",
    },
    width: {
        type: String,
        default: "24",
    },
    height: {
        type: String,
        default: "24",
    },
});
</script>
