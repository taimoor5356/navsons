<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        :width="width"
        :height="height"
        :class="colorClass"
        viewBox="0 0 24 24"
        fill="none"
    >
        <rect
            x="10.9"
            y="2"
            width="2.2"
            height="20"
            rx="1.1"
            transform="rotate(45 12 12)"
            fill="currentColor"
        />
        <rect
            x="10.9"
            y="2"
            width="2.2"
            height="20"
            rx="1.1"
            transform="rotate(-45 12 12)"
            fill="currentColor"
        />
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
