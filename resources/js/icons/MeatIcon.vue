<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        :width="width"
        :height="height"
        viewBox="0 0 24 24"
        fill="none"
        :class="colorClass"
    >
        <circle
            cx="9.5"
            cy="9.5"
            r="5.5"
            stroke="currentColor"
            stroke-width="1.5"
        />
        <path
            d="M13.5 13.5L19 19"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
        />
        <circle cx="20.2" cy="20.2" r="1.3" fill="currentColor" />
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
