<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        :width="width"
        :height="height"
        :class="colorClass"
        viewBox="0 0 24 24"
        fill="none"
    >
        <circle cx="6.5" cy="7.3" r="1.7" fill="currentColor" />
        <rect x="5.3" y="10.5" width="2.4" height="8" rx="1" fill="currentColor" />
        <rect x="11" y="13" width="2.2" height="6" rx="1" fill="currentColor" />
        <rect x="15.8" y="13" width="2.2" height="6" rx="1" fill="currentColor" />
        <rect x="11" y="10.5" width="7" height="2.2" rx="1.1" fill="currentColor" />
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
