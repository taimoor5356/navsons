<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        :width="width"
        :height="height"
        :class="colorClass"
        viewBox="0 0 24 24"
        fill="none"
    >
        <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M7 3H17C19.2091 3 21 4.79086 21 7V17C21 19.2091 19.2091 21 17 21H7C4.79086 21 3 19.2091 3 17V7C3 4.79086 4.79086 3 7 3ZM7 5C5.89543 5 5 5.89543 5 7V17C5 18.1046 5.89543 19 7 19H17C18.1046 19 19 18.1046 19 17V7C19 5.89543 18.1046 5 17 5H7Z"
            fill="currentColor"
        />
        <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9ZM11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12Z"
            fill="currentColor"
        />
        <circle cx="17" cy="7" r="1.1" fill="currentColor" />
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
