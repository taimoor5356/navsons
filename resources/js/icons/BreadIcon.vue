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
            d="M4 12.5C4 8.5 7.5 5 12 5C16.5 5 20 8.5 20 12.5C20 13.5 19.5 14 18.5 14H5.5C4.5 14 4 13.5 4 12.5Z"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linejoin="round"
        />
        <path
            d="M4 14L4.6 17.3C4.8 18.3 5.6 19 6.6 19H17.4C18.4 19 19.2 18.3 19.4 17.3L20 14"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
        />
        <path
            d="M9 9.5C9.5 9 10.5 9 11 9.5M13 9.5C13.5 9 14.5 9 15 9.5"
            stroke="currentColor"
            stroke-width="1.4"
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
