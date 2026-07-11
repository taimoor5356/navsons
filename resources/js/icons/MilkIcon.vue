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
            d="M9.5 3H14.5"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
        />
        <path
            d="M10 3V6.3L7.2 9.5C6.7 10.1 6.4 10.9 6.4 11.7V19C6.4 20.1 7.3 21 8.4 21H15.6C16.7 21 17.6 20.1 17.6 19V11.7C17.6 10.9 17.3 10.1 16.8 9.5L14 6.3V3"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linejoin="round"
        />
        <path
            d="M6.6 13H17.4"
            stroke="currentColor"
            stroke-width="1.5"
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
