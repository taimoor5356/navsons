<template>
    <div
        class="fixed bottom-0 inset-x-0 z-40 flex md:hidden items-center justify-around bg-[#0d2d6c] py-2.5 px-2"
    >
        <RouterLink to="/" class="flex items-center justify-center p-1">
            <HomeIcon class="w-6 h-6 text-white" />
        </RouterLink>

        <button
            type="button"
            @click="goToWishlist"
            class="flex items-center justify-center p-1"
        >
            <WishlistIconOutline colorClass="fill-white" width="24" height="24" />
        </button>

        <button
            type="button"
            @click="toggleSearch"
            class="flex items-center justify-center p-1"
        >
            <MenuSearchIcon colorClass="text-white" width="24" height="24" />
        </button>

        <button
            type="button"
            @click="openCart"
            class="flex items-center justify-center p-1"
        >
            <Bag colorClass="text-white" width="21" height="21" />
        </button>

        <button
            type="button"
            @click="goToUser"
            class="flex items-center justify-center p-1"
        >
            <UserIcon class="w-6 h-6 text-white" />
        </button>
    </div>

    <SearchModal
        :showSearch="showSearch"
        @closeModal="(bool) => (showSearch = bool)"
    />
</template>

<script setup>
import { ref } from "vue";
import { RouterLink, useRouter } from "vue-router";
import { HomeIcon, UserIcon } from "@heroicons/vue/24/outline";
import WishlistIconOutline from "../icons/WishlistIconOutline.vue";
import MenuSearchIcon from "../icons/MenuSearchIcon.vue";
import Bag from "../icons/Bag.vue";
import SearchModal from "./SearchModal.vue";
import { useAuth } from "../stores/AuthStore";
import { useMaster } from "../stores/MasterStore";
import { useBasketStore } from "../stores/BasketStore";

const router = useRouter();
const AuthStore = useAuth();
const master = useMaster();
const basketStore = useBasketStore();

const showSearch = ref(false);

const toggleSearch = () => {
    showSearch.value = !showSearch.value;
};

const goToWishlist = () => {
    if (!AuthStore.token) {
        AuthStore.showLoginModal();
        return;
    }
    router.push("/wishlist");
};

const openCart = () => {
    if (!master.basketCanvas) {
        basketStore.fetchCheckoutProducts();
    }
    master.basketCanvas = !master.basketCanvas;
};

const goToUser = () => {
    if (!AuthStore.token) {
        AuthStore.showLoginModal();
        return;
    }
    router.push("/dashboard");
};
</script>
