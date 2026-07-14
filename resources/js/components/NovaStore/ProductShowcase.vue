<template>
    <SectionContainer :title="title" :isLoading="isLoading" class="!pt-0 !pb-2 !px-4">
        <template #button>
            <div class="flex justify-center items-center gap-4">
                <ViewAllBtn link="/products" />
            </div>
        </template>

        <div
            v-if="!isLoading"
            class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6 items-start"
        >
            <p
                v-if="products.length == 0"
                class="col-span-full text-center text-primary"
            >
                No products to show
            </p>
            <div v-for="product in products" :key="product.id" class="w-full">
                <ProductCard :product="product" />
            </div>
        </div>

        <!-- loading -->
        <div
            v-else
            class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-3 md:gap-6 items-start"
        >
            <div v-for="i in 6" :key="i">
                <SkeletonLoader class="w-full h-[220px] sm:h-[330px]" />
            </div>
        </div>
    </SectionContainer>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import ProductCard from "../NovaStore/ProductCard.vue";
import SkeletonLoader from "../SkeletonLoader.vue";
import SectionContainer from "../SectionContainer.vue";
import ViewAllBtn from "../ViewAllBtn.vue";
import { useAuth } from "../../stores/AuthStore";

const authStore = useAuth();

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    sortType: {
        type: String,
        required: true,
    },
    hasDiscount: {
        type: Boolean,
        default: false,
    },
    categoryName: {
        type: String,
        default: "",
    },
    createdWithinDays: {
        type: Number,
        default: null,
    },
});

const products = ref([]);
const isLoading = ref(true);

onMounted(() => {
    isLoading.value = true;
    axios
        .get("/products", {
            params: {
                page: 1,
                per_page: 12,
                sort_type: props.sortType,
                has_discount: props.hasDiscount ? 1 : undefined,
                category_name: props.categoryName || undefined,
                created_within_days: props.createdWithinDays || undefined,
            },
            headers: {
                Authorization: authStore.token,
            },
        })
        .then((response) => {
            products.value = response.data.data.products;
            isLoading.value = false;
        })
        .catch(() => {
            isLoading.value = false;
        });
});
</script>
