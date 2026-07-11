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
            d="M12 21C7.5 21 5 17.8 5 13.8C5 10.3 7.3 7.5 10.2 7.5C11.1 7.5 11.8 7.8 12.3 8.1C12.8 7.8 13.5 7.5 14.4 7.5C17.3 7.5 19.6 10.3 19.6 13.8C19.6 17.8 16.5 21 12 21Z"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linejoin="round"
        />
        <path
            d="M12 7.5V5"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
        />
        <path
            d="M12 5C12 3.5 13.2 2.5 14.5 2.7"
            stroke="currentColor"
            stroke-width="1.5"
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
