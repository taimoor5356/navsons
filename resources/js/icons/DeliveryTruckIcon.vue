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
            d="M2 6.5H13.5V15.5H2V6.5Z"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linejoin="round"
        />
        <path
            d="M13.5 9.5H17.5L20.5 12.5V15.5H13.5V9.5Z"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linejoin="round"
        />
        <circle cx="6" cy="17" r="1.5" stroke="currentColor" stroke-width="1.5" />
        <circle cx="17" cy="17" r="1.5" stroke="currentColor" stroke-width="1.5" />
        <path
            d="M4 17H2.5M9.5 17H13.5M18.5 17H20.5"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
        />
        <path
            d="M0 7.5H2.5"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
        />
        <path
            d="M0 10.5H3.5"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
        />
        <path
            d="M0 13.5H2.5"
            stroke="currentColor"
            stroke-width="1.6"
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
