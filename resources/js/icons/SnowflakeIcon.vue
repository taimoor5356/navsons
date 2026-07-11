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
            d="M12 2V22M4.5 6.5L19.5 17.5M19.5 6.5L4.5 17.5"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
        />
        <path
            d="M9 4.5L12 6.5L15 4.5M9 19.5L12 17.5L15 19.5M4 9.3L7 10.3L6.5 13.5M20 9.3L17 10.3L17.5 13.5M4 14.7L7 13.7L6.5 10.5M20 14.7L17 13.7L17.5 10.5"
            stroke="currentColor"
            stroke-width="1.3"
            stroke-linecap="round"
            stroke-linejoin="round"
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
