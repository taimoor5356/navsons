<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        :width="width"
        :height="height"
        viewBox="0 0 24 24"
        fill="none"
        :class="colorClass"
    >
        <path
            d="M3 6H15"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
        />
        <path
            d="M3 11.5H12"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
        />
        <path
            d="M3 17H9"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
        />
        <circle
            cx="16.5"
            cy="16.5"
            r="4"
            stroke="currentColor"
            stroke-width="1.8"
        />
        <path
            d="M19.4 19.4L22 22"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
        />
    </svg>
</template>

<script setup>
const props = defineProps({
    colorClass: {
        type: String,
        default: "text-primary",
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
