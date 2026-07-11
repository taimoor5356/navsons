<template>
    <div class="w-full lg:w-60 shrink-0 h-full flex flex-col">
        <p
            class="text-sm font-bold text-slate-900 mt-3 lg:mt-0 mb-2"
        >
            {{ $t("Our Partners") }}
        </p>

        <!-- mobile / tablet: horizontal scroll, no visible scrollbar -->
        <div
            class="flex lg:hidden items-center gap-3 overflow-x-auto scrollbar-hide"
        >
            <component
                :is="brand.slug ? 'RouterLink' : 'div'"
                v-for="brand in displayBrands"
                :key="brand.id"
                :to="brand.slug ? `/shops/${brand.slug}` : undefined"
                class="shrink-0 w-14 h-14 rounded-lg border border-slate-100 flex items-center justify-center bg-white p-1.5"
                :title="brand.name"
            >
                <img
                    v-if="brand.logo"
                    :src="brand.logo"
                    :alt="brand.name"
                    class="w-full h-full object-contain rounded"
                />
                <StorefrontIcon v-else class="w-6 h-6" colorClass="text-primary" />
            </component>
        </div>

        <!-- large screens: only show as many as fit -->
        <div
            ref="panelRef"
            class="hidden lg:grid grid-cols-2 content-start gap-2 flex-1 overflow-hidden"
        >
            <component
                :is="brand.slug ? 'RouterLink' : 'div'"
                v-for="brand in visibleBrands"
                :key="brand.id"
                :to="brand.slug ? `/shops/${brand.slug}` : undefined"
                class="w-full h-24 rounded-lg border border-slate-100 flex items-center justify-center bg-white p-2"
                :title="brand.name"
            >
                <img
                    v-if="brand.logo"
                    :src="brand.logo"
                    :alt="brand.name"
                    class="w-full h-full object-contain rounded"
                />
                <StorefrontIcon v-else class="w-9 h-9" colorClass="text-primary" />
            </component>
        </div>

        <RouterLink
            v-if="hasMore"
            to="/shops"
            class="hidden lg:block mt-2 text-primary text-xs font-medium text-center hover:underline"
        >
            {{ $t("View more") }}
        </RouterLink>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount, nextTick } from "vue";
import StorefrontIcon from "../../icons/StorefrontIcon.vue";
import stripeLogo from "../../../../public/assets/gateway/Stripe.png";
import paypalLogo from "../../../../public/assets/gateway/PayPal.png";
import razorpayLogo from "../../../../public/assets/gateway/Razorpay.png";
import paystackLogo from "../../../../public/assets/gateway/PayStack.png";
import mastercardLogo from "../../../../public/assets/gateway/mastercard.png";
import visaLogo from "../../../../public/assets/gateway/visa.png";

const props = defineProps({
    shops: {
        type: Array,
        default: () => [],
    },
});

// shown until real vendor shops exist, so the section isn't empty
const FALLBACK_BRANDS = [
    { id: "fallback-1", name: "Stripe", logo: stripeLogo, slug: null },
    { id: "fallback-2", name: "PayPal", logo: paypalLogo, slug: null },
    { id: "fallback-3", name: "Razorpay", logo: razorpayLogo, slug: null },
    { id: "fallback-4", name: "PayStack", logo: paystackLogo, slug: null },
    { id: "fallback-5", name: "Mastercard", logo: mastercardLogo, slug: null },
    { id: "fallback-6", name: "Visa", logo: visaLogo, slug: null },
];

const CELL_HEIGHT = 96; // matches h-24
const ROW_GAP = 8; // matches gap-2
const COLUMNS = 2;

const panelRef = ref(null);
const maxVisible = ref(6);
let observer;

const displayBrands = computed(() =>
    props.shops.length ? props.shops : FALLBACK_BRANDS
);

const recalculate = () => {
    if (!panelRef.value) return;
    const availableHeight = panelRef.value.clientHeight;
    if (!availableHeight) return;
    const rows = Math.max(
        1,
        Math.floor((availableHeight + ROW_GAP) / (CELL_HEIGHT + ROW_GAP))
    );
    maxVisible.value = rows * COLUMNS;
};

onMounted(async () => {
    await nextTick();
    recalculate();
    observer = new ResizeObserver(() => recalculate());
    if (panelRef.value) observer.observe(panelRef.value);
    window.addEventListener("resize", recalculate);
});

onBeforeUnmount(() => {
    observer?.disconnect();
    window.removeEventListener("resize", recalculate);
});

const hasMore = computed(() => displayBrands.value.length > maxVisible.value);

const visibleBrands = computed(() => {
    if (!hasMore.value) return displayBrands.value;
    return displayBrands.value.slice(0, maxVisible.value);
});
</script>
