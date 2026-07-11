<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        :width="width"
        :height="height"
        viewBox="0 0 24 24"
        fill="none"
        :class="colorClass"
    >
        <ellipse cx="12" cy="15.5" rx="5" ry="4" stroke="currentColor" stroke-width="1.5" />
        <ellipse cx="6.2" cy="9.8" rx="1.8" ry="2.3" stroke="currentColor" stroke-width="1.5" />
        <ellipse cx="10.4" cy="6.8" rx="1.8" ry="2.3" stroke="currentColor" stroke-width="1.5" />
        <ellipse cx="14.6" cy="6.8" rx="1.8" ry="2.3" stroke="currentColor" stroke-width="1.5" />
        <ellipse cx="18.3" cy="9.8" rx="1.8" ry="2.3" stroke="currentColor" stroke-width="1.5" />
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
