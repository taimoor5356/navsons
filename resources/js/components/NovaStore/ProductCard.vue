<template>
    <div
        class="w-full self-stretch cursor-pointer rounded-none outline outline-1 outline-offset-[-1px] outline-gray-100 inline-flex flex-col justify-start items-start overflow-hidden transition-all duration-200 hover:bg-[rgba(13,45,108,0.03)] hover:border-none hover:shadow-[0px_0px_8px_0px_rgba(13,45,108,0.24)] hover:outline hover:outline-[#0d2d6c] group"
    >
        <div
            class="w-full h-44 relative flex flex-col justify-start items-start gap-2.5 overflow-hidden"
        >
            <RouterLink :to="`/products/${props.product?.slug}`" class="h-full w-full">
                <img
                    class="h-full w-full group-hover:scale-110 transition-all duration-700 object-cover"
                    :src="product?.thumbnail"
                    alt="product"
                />
            </RouterLink>

            <div
                @click="favoriteAddOrRemove"
                class="p-1 lg:p-2.5 right-[8px] top-[8px] absolute bg-white rounded-3xl shadow-[0px_2px_4px_0px_rgba(0,0,0,0.16)] inline-flex justify-center items-center gap-2.5"
            >
                <RiHeart3Fill
                    v-if="product?.is_favorite"
                    class="w-6 h-6 text-primary-400"
                />
                <RiHeart3Line v-else class="w-6 h-6" />
            </div>
            <div
                class="w-full left-0 bottom-1 absolute inline-flex justify-between items-center px-4"
            >
                <div
                    class="h-5 px-1 bg-white/60 rounded flex justify-center items-center gap-2.5"
                >
                    <div class="flex justify-start items-center gap-0.5">
                        <RiStarFill class="w-[14px] text-warning" />

                        <div class="flex justify-start items-center gap-0.5">
                            <p
                                class="justify-start text-zinc-900 text-xs font-bold leading-tight"
                            >
                                {{ product?.rating }}
                            </p>
                            <p
                                class="justify-start text-slate-500 text-xs font-normal leading-tight"
                            >
                                ({{ product?.total_reviews }})
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="h-5 px-1 bg-white/60 rounded flex justify-center items-center gap-2.5"
                >
                    <div class="flex justify-start items-center gap-1">
                        <p
                            class="justify-start text-zinc-900 text-xs font-normal leading-tight"
                        >
                            Sold:
                        </p>
                        <div class="flex justify-start items-center">
                            <div
                                class="justify-start text-slate-500 text-xs font-normal leading-tight"
                            >
                                {{ product?.quantity }} /
                            </div>
                            <div
                                class="justify-start text-slate-500 text-xs font-normal leading-tight"
                            >
                                {{ product?.total_sold }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
            v-if="product?.discount_percentage > 0"
                class="h-4 px-1.5 py-0.5 left-[8px] top-[8px] absolute bg-red-500 rounded inline-flex justify-center items-center gap-2"
            >
                <div
                    class="justify-start text-white text-[10px] font-normal leading-none"
                >
                    {{ product?.discount_percentage }}%
                    {{ $t("OFF") }}
                </div>
            </div>
        </div>
        <div
            class="self-stretch p-3 flex flex-col justify-start items-start gap-3"
        >
            <div
                class="self-stretch flex flex-col justify-start items-start gap-2"
            >
                <RouterLink :to="`/products/${props.product?.slug}`"
                    class="w-full flex flex-col justify-start items-center gap-1"
                >
                    <p
                        class="self-stretch justify-start text-primary text-xs font-normal font-['Albert_Sans'] leading-none"
                    >
                        {{ product?.category }}
                    </p>
                    <p
                        class="w-full inline-block text-[#0d2d6c] text-base font-semibold leading-normal h-12 overflow-hidden capitalize"
                    >
                        {{ truncate(product?.name, 60) }}
                    </p>
                </RouterLink>
                <div
                    class="self-stretch inline-flex justify-between items-center"
                >
                    <div class="flex justify-start items-center gap-0.5">
                        <div
                            v-if="product?.discount_price > 0"
                            class="justify-start text-gray-400 text-xs font-normal line-through leading-none"
                        >
                            {{ masterStore.showCurrency(product?.price) }}
                        </div>
                        <div
                            class="justify-start text-[#a20d32] text-base font-bold leading-normal"
                        >
                            {{
                                masterStore.showCurrency(
                                    product?.discount_price > 0
                                        ? product?.discount_price
                                        : product?.price
                                )
                            }}
                        </div>
                    </div>
                    <div class="flex justify-start items-center gap-0.5">
                        <div
                            class="justify-start text-slate-500 text-sm font-bold leading-tight"
                        >
                            {{ truncate(props.product?.unit, 10) }}
                        </div>
                    </div>
                </div>
            </div>
            <button
                @click="addToBasket(props.product)"
                class="self-end w-8 h-8 bg-[#0d2d6c] rounded-none flex justify-center items-center disabled:opacity-50 disabled:cursor-not-allowed"
                :disabled="product?.quantity === 0"
            >
                <PlusIcon class="w-5 h-5 text-white" />
            </button>
        </div>
    </div>
</template>

<script setup>
import { HeartIcon as HeartIconOutline, PlusIcon } from "@heroicons/vue/24/outline";
import { HeartIcon, StarIcon } from "@heroicons/vue/24/solid";
import {
    RiHomeLine,
    RiStarFill,
    RiHeart3Line,
    RiHeart3Fill,
} from "vue-remix-icons";
import { ref } from "vue";
import { useRouter } from "vue-router";
import { useToast } from "vue-toastification";
import BagIcon from "../../icons/Bag.vue";
import { useAuth } from "../../stores/AuthStore";
import { useBasketStore } from "../../stores/BasketStore";
import { useMaster } from "../../stores/MasterStore";
import { useTruncateText } from "../../composables/useTruncateText";

const router = useRouter();

const masterStore = useMaster();

const basketStore = useBasketStore();
const authStore = useAuth();

const toast = useToast();

const { truncate } = useTruncateText();

const props = defineProps({
    product: Object,
});

const orderData = {
    is_buy_now: false,
    product_id: props.product?.id,
    quantity: 1,
    size: null,
    color: null,
    unit: null,
};

const addToBasket = (product) => {
    // add product to basket
    basketStore.addToCart(orderData, product);
};

const buyNow = async () => {
    if (authStore.token === null) {
        return (authStore.loginModal = true);
    }

    await basketStore.addToCart(
        {
            product_id: props.product?.id,
            is_buy_now: true,
            quantity: 1,
            size: null,
            color: null,
            unit: null,
        },
        props.product
    );

    basketStore.buyNowShopId = props.product?.shop.id;
    router.push({ name: "buynow" });
};

const isFavorite = ref(props.product?.is_favorite);

const favoriteAddOrRemove = () => {
    if (authStore.token === null) {
        return (authStore.loginModal = true);
    }
    axios
        .post(
            "/favorite-add-or-remove",
            {
                product_id: props.product.id,
            },
            {
                headers: {
                    Authorization: authStore.token,
                },
            }
        )
        .then((response) => {
            props.product.is_favorite = !props.product.is_favorite;
            isFavorite.value = response.data.data.product.is_favorite;
            if (isFavorite.value === false) {
                toast.warning("Product removed from favorite", {
                    position:
                        masterStore.langDirection === "rtl"
                            ? "bottom-right"
                            : "bottom-left",
                });
            } else {
                toast.success("Product added to favorite", {
                    position:
                        masterStore.langDirection === "rtl"
                            ? "bottom-right"
                            : "bottom-left",
                });
            }
            authStore.favoriteRemove = true;
            authStore.fetchFavoriteProducts();
        });
};

const showProductDetails = () => {
    if (props.product.quantity > 0) {
        router.push({
            name: "productDetails",
            params: { id: props.product.id },
        });
    }
};
</script>
