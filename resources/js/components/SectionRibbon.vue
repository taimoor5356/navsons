<template>
    <div class="inline-block -rotate-3 text-white px-6 py-2.5 rounded-none shadow-md text-2xl md:text-3xl tracking-wide" style="background-color: #a20d32; font-family: 'Alex Brush', cursive;">
        {{ text }}
    </div>
</template>

<script setup>
defineProps({
    text: {
        type: String,
        required: true,
    },
});
</script>
