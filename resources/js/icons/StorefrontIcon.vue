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
            d="M4 9.5L4.8 4.8C4.9 4.3 5.4 4 5.9 4H18.1C18.6 4 19.1 4.3 19.2 4.8L20 9.5"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
        />
        <path
            d="M4 9.5C4 10.9 5.1 12 6.5 12C7.9 12 9 10.9 9 9.5C9 10.9 10.1 12 11.5 12C12.9 12 14 10.9 14 9.5C14 10.9 15.1 12 16.5 12C17.9 12 19 10.9 19 9.5"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
        />
        <path
            d="M5 12V18.5C5 19.3 5.7 20 6.5 20H17.5C18.3 20 19 19.3 19 18.5V12"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
        />
        <path
            d="M9.5 20V16C9.5 15.4 10 15 10.5 15H13.5C14 15 14.5 15.4 14.5 16V20"
            stroke="currentColor"
            stroke-width="1.5"
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
