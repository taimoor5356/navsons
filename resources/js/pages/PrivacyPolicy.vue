<template>
    <div class="max-w-[1000px] mx-auto px-[7.5px] py-8 md:py-12">
        <div class="w-full">
            <div class="flex justify-center gap-2 mb-6 mt-6">
                <button
                    type="button"
                    @click="lang = 'en'"
                    class="px-5 py-2 rounded-full text-sm font-medium border transition-colors"
                    :class="lang === 'en'
                        ? 'bg-primary text-white border-primary'
                        : 'bg-white text-slate-600 border-slate-300 hover:border-primary'"
                >
                    English
                </button>
                <button
                    type="button"
                    @click="lang = 'ur'"
                    class="px-5 py-2 rounded-full text-sm font-medium border transition-colors"
                    :class="lang === 'ur'
                        ? 'bg-primary text-white border-primary'
                        : 'bg-white text-slate-600 border-slate-300 hover:border-primary'"
                >
                    اردو
                </button>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 md:p-10">
                <div
                    class="prose max-w-none w-full prose-headings:text-slate-800 prose-p:text-slate-600 prose-li:text-slate-600"
                    :class="lang === 'en' ? 'show-en' : 'show-ur'"
                    v-html="content?.description"
                ></div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const content = ref({});
const lang = ref('en');

onMounted(() => {
    fetchData();
    window.scrollTo(0, 0);
});

const fetchData = () => {
    axios.get('/legal-pages/privacy-policy').then((response) => {
        content.value = response.data.data.content;
    });
}

</script>

<style scoped>
.show-en :deep(.lang-ur) {
    display: none;
}

.show-ur :deep(.lang-en) {
    display: none;
}

:deep(.lang-ur) {
    direction: rtl;
    text-align: right;
    font-family: 'Noto Nastaliq Urdu', 'Jameel Noori Nastaleeq', serif;
}
</style>
