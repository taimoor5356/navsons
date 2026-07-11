<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        :width="width"
        :height="height"
        viewBox="0 0 24 24"
        fill="none"
        :class="colorClass"
    >
        <circle cx="12" cy="12" r="2.3" stroke="currentColor" stroke-width="1.5" />
        <path
            d="M12 9.7C10.5 9.7 9.3 8.5 9.3 7C9.3 5.5 10.5 4.3 12 4.3C13.5 4.3 14.7 5.5 14.7 7C14.7 8.5 13.5 9.7 12 9.7Z"
            stroke="currentColor"
            stroke-width="1.5"
        />
        <path
            d="M12 14.3C13.5 14.3 14.7 15.5 14.7 17C14.7 18.5 13.5 19.7 12 19.7C10.5 19.7 9.3 18.5 9.3 17C9.3 15.5 10.5 14.3 12 14.3Z"
            stroke="currentColor"
            stroke-width="1.5"
        />
        <path
            d="M14.3 12C14.3 10.5 15.5 9.3 17 9.3C18.5 9.3 19.7 10.5 19.7 12C19.7 13.5 18.5 14.7 17 14.7C15.5 14.7 14.3 13.5 14.3 12Z"
            stroke="currentColor"
            stroke-width="1.5"
        />
        <path
            d="M9.7 12C9.7 13.5 8.5 14.7 7 14.7C5.5 14.7 4.3 13.5 4.3 12C4.3 10.5 5.5 9.3 7 9.3C8.5 9.3 9.7 10.5 9.7 12Z"
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
