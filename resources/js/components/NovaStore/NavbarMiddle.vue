<template>
    <div class="main-container py-3 flex justify-start items-center gap-8">
        <RouterLink class="" to="/">
            <img v-if="master.logo" :src="master.logo" alt="" class="h-[40px] w-full object-contain" />
            <img v-else src="../../../../public/assets/logo.png" class="h-[40px] w-full object-contain" />
        </RouterLink>
        <!-- <div class="text-slate-500 flex items-center gap-1 font-normal text-sm leading-[22px]">
            <div class="icon">
                <img
                    src="https://img.icons8.com/ios/50/0d2d6c/marker--v1.png"
                    alt=""
                    class="w-5 h-4"
                />
            </div>
               <span class="hidden md:block text-[#0d2d6c]">{{ truncate(master?.address, 60)}}</span>
               <span class="block md:hidden text-[#0d2d6c]" >{{ truncate(master?.address, 10) }}</span>
        </div> -->
            <form
                @submit.prevent="goToSearch"
                class="relative flex-1 min-w-0 h-12 bg-[#f1f1ff] rounded-lg hidden md:flex items-center overflow-hidden"
                >
                <div class="relative flex items-center gap-2 pl-4 pr-2 h-full flex-1 min-w-0">
                    <MagnifyingGlassIcon class="w-5 h-5 text-slate-400 shrink-0" />
                    <input
                        type="search"
                        name="search"
                        v-model="search"
                        autocomplete="off"
                        @focus="searchFocused = true"
                        @blur="searchFocused = false"
                        class="relative z-10 form-control grow h-full inline-block bg-transparent text-[#0d2d6c] text-base font-normal font-['Lato'] leading-normal outline-none"
                    />
                    <div
                        v-if="!search && !searchFocused"
                        class="absolute left-11 right-2 h-5 overflow-hidden pointer-events-none flex items-center"
                    >
                        <Transition name="ticker">
                            <span
                                :key="tickerIndex"
                                class="absolute inset-0 flex items-center gap-1.5 text-slate-400 text-sm"
                            >
                                <component
                                    :is="searchTickerItems[tickerIndex].icon"
                                    class="w-4 h-4 shrink-0"
                                    colorClass="text-slate-400"
                                />
                                <span>{{ $t("Search for") }} {{ $t(searchTickerItems[tickerIndex].label) }}</span>
                            </span>
                        </Transition>
                    </div>
                </div>
                <button type="submit" class="h-full px-4 py-3 bg-primary shrink-0 flex items-center justify-center">
                    <RiSearchLine class="w-6 h-6 text-white" />
                </button>
            </form>
        <div
            class="hidden lg:flex justify-between items-center gap-4"
            :class="master.langDirection == 'rtl' ? 'mr-auto' : 'ml-auto'"
        >
            <RouterLink to="/wishlist" class="relative">
                <WishlistIconOutline colorClass="fill-slate-700" height="24" width="24" />
                <div
                    class="absolute -top-2.5 -right-2 w-3.5 h-3.5 bg-primary-500 rounded-2xl outline outline-1 outline-white inline-flex flex-col justify-center items-center gap-1.5 text-white text-[8.53px] font-bold leading-3"
                >
                    {{ AuthStore.favoriteProducts }}
                </div>
            </RouterLink>

            <div
                v-if="
                    routerName !== 'checkout' &&
                    routerName !== 'blogs' &&
                    routerName !== 'blog-details'
                "
                @click="showCardCanvas"
                class="cursor-pointer relative"
            >
                <Bag colorClass="text-slate-700" height="24" width="24" />
                <div
                    class="absolute -top-2 -right-1.5 w-3.5 h-3.5 bg-primary-500 rounded-2xl outline outline-1 outline-white inline-flex flex-col justify-center items-center gap-1.5 text-white text-[8.53px] font-bold leading-3"
                >
                    {{ basketStore.total }}
                </div>
            </div>

            <div v-if="AuthStore.user" class="login__btn flex">
                <RouterLink to="/dashboard" class="avatar">
                    <img :src="AuthStore.user?.profile_photo" alt="profile" />
                </RouterLink>
            </div>

            <button
                v-else
                class="flex items-center gap-2 lg:p-2.5 text-slate-600 hover:text-primary"
                @click="showLoginDialog"
            >
                <span class="text-base font-normal leading-normal">{{
                    $t("Login")
                }}</span>
                <UserIcon class="w-5 h-5" />
            </button>
        </div>

        <div
            class="flex lg:hidden justify-between items-center gap-4"
            :class="master.langDirection == 'rtl' ? 'mr-auto' : 'ml-auto'"
        >
            <button
                type="button"
                class="flex justify-center items-center h-8 w-8 rounded-full bg-[#0d2d6c]"
                @click="mobileMenuOpen = true"
            >
                <Bars3Icon class="w-5 h-5 text-white" />
            </button>
        </div>
    </div>

    <!-- Login Dialog Modal -->
    <LoginModal />
    <!-- End Login Dialog Modal -->

    <!-- Mobile Menu Canvas Drawer -->
    <TransitionRoot as="template" :show="mobileMenuOpen">
        <Dialog as="div" class="relative z-50" @close="mobileMenuOpen = false">
            <TransitionChild
                as="template"
                enter="ease-in-out duration-500"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in-out duration-500"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div
                    class="fixed inset-0 bg-gray-500 bg-opacity-30 transition-opacity"
                />
            </TransitionChild>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div
                        class="pointer-events-none fixed inset-y-0 flex max-w-72"
                        :class="
                            master.langDirection == 'rtl'
                                ? 'left-0 '
                                : 'right-0 '
                        "
                    >
                        <TransitionChild
                            as="template"
                            enter="transform transition ease-in-out duration-500 sm:duration-700"
                            :enter-from="
                                master.langDirection == 'rtl'
                                    ? '-translate-x-[200%]'
                                    : 'translate-x-[200%]'
                            "
                            enter-to="translate-x-0"
                            leave="transform transition ease-in-out duration-500 sm:duration-700"
                            leave-from="translate-x-0"
                            :leave-to="
                                master.langDirection == 'rtl'
                                    ? '-translate-x-[200%]'
                                    : 'translate-x-[200%]'
                            "
                        >
                            <DialogPanel
                                class="pointer-events-auto relative w-screen max-w-md"
                            >
                                <TransitionChild
                                    as="template"
                                    enter="ease-in-out duration-500"
                                    enter-from="opacity-0"
                                    enter-to="opacity-100"
                                    leave="ease-in-out duration-500"
                                    leave-from="opacity-100"
                                    leave-to="opacity-0"
                                >
                                    <div
                                        class="absolute left-0 top-0 -ml-8 flex pr-2 pt-4 sm:-ml-10 sm:pr-4"
                                    ></div>
                                </TransitionChild>
                                <div class="h-full bg-white shadow-xl p-4">
                                    <div
                                        class="flex justify-between items-cente pb-4"
                                    >
                                        <div
                                            class="text-slate-950 text-lg font-bold leading-normal tracking-tight font-['Roboto']"
                                        >
                                            {{ $t("Menu") }}
                                        </div>

                                        <button
                                            class="w-7 h-7 flex justify-center items-center bg-slate-100 rounded-full"
                                            @click="mobileMenuOpen = false"
                                        >
                                            <XMarkIcon
                                                class="w-5 h-5 text-slate-700"
                                            />
                                        </button>
                                    </div>

                                    <div
                                        class="w-full flex flex-col overflow-y-scroll max-h-screen scrollbar-hide"
                                    >

                                        <div
                                            class="p-2 bg-slate-50 rounded-lg border border-slate-100 flex flex-col gap-1 sticky top-0 z-10"
                                        >
                                            <div
                                                v-if="!AuthStore.user"
                                                class="flex justify-between items-center px-3 py-[7px] bg-white rounded-md border border-slate-100 gap-2"
                                                @click="showLoginDialog"
                                            >
                                                <div
                                                    class="flex items-center gap-2"
                                                >
                                                    <UserIcon
                                                        class="w-5 h-5 text-slate-950"
                                                    />
                                                    <div
                                                        class="text-slate-950 text-sm font-normal leading-tight"
                                                    >
                                                        {{ $t("Login") }}
                                                    </div>
                                                </div>
                                                <ChevronRightIcon
                                                    class="w-6 h-6 text-slate-600"
                                                />
                                            </div>
                                            <div v-else class="w-full">
                                                <AuthUserDropdown />
                                            </div>

                                            <div
                                                class="flex justify-between items-center px-3 py-[10px] bg-white rounded-md border border-slate-100 gap-2"
                                                @click="showWishlist()"
                                            >
                                                <div
                                                    class="flex items-center gap-1"
                                                >
                                                    <img
                                                        src="../../../../public/assets/images/heart.svg"
                                                        class="w-6 h-6 text-slate-950"
                                                    />
                                                    <div
                                                        class="text-slate-950 text-sm font-normal leading-tight"
                                                    >
                                                        {{ $t("Wishlist") }}
                                                    </div>
                                                </div>
                                                <div
                                                    class="w-4 h-4 bg-primary rounded-full border border-white flex justify-center items-center text-white"
                                                >
                                                    <span
                                                        class="text-white text-[8px] font-bold"
                                                    >
                                                        {{
                                                            AuthStore.favoriteProducts
                                                        }}
                                                    </span>
                                                </div>
                                            </div>


                                            <div
                                                class="flex justify-between items-center px-3 py-[10px] bg-white rounded-md border border-slate-100 gap-2"
                                                
                                                @click="showMyCart()"
                                            >
                                                <div
                                                    class="flex items-center gap-1"
                                                >
                                                    <img
                                                        src="../../../../public/assets/images/cart-bag.svg"
                                                        class="w-6 h-6 text-slate-950"
                                                    />
                                                    <div
                                                        @click="showCardCanvas"
                                                        class="text-slate-950 text-sm font-normal leading-tight"
                                                    >
                                                        {{ $t("My Cart") }}
                                                    </div>
                                                </div>
                                                <div
                                                    class="w-4 h-4 bg-primary rounded-full border border-white flex justify-center items-center text-white"
                                                >
                                                    <span
                                                        class="text-white text-[8px] font-bold"
                                                    >
                                                        {{ basketStore.total }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- menues  -->
                                        <div
                                            class="justify-start inline-flex grow flex-col mt-5 gap-[15px]"
                                        >
                                            <div
                                                v-for="menu in master.menus"
                                                :key="menu.id"
                                                class="w-full text-base leading-normal"
                                            >
                                                <template
                                                    v-if="!menu.is_external"
                                                >
                                                    <router-link
                                                        v-if="
                                                            menu.name !=
                                                            'categories'
                                                        "
                                                        :to="menu.url"
                                                        class="text-slate-950 block font-medium"
                                                    >
                                                        {{ $t(menu.name) }}
                                                    </router-link>

                                                    <div
                                                        v-else
                                                        class="space-y-2"
                                                    >
                                                        <div
                                                            class="text-slate-950 flex justify-between items-center font-medium capitalize cursor-pointer"
                                                            @click="
                                                                showCategoryDropdown =
                                                                    !showCategoryDropdown
                                                            "
                                                        >
                                                            <p>{{ $t(menu.name) }}</p>

                                                            <ChevronDownIcon
                                                                class="w-4 h-4 text-slate-500 transition-all duration-300"
                                                                :class="showCategoryDropdown ? 'rotate-180' : ''"
                                                            />
                                                        </div>
                                                        <Transition
                                                            name="category-menu"
                                                        >
                                                            <ul
                                                                v-if="
                                                                    showCategoryDropdown
                                                                "
                                                                class="space-y-[15px] overflow-hidden ml-3"
                                                            >
                                                                <RouterLink
                                                                    :to="`/categories/${category.id}`"
                                                                    v-for="category in allCategories"
                                                                    class="cursor-pointer text-base block"
                                                                >
                                                                    {{
                                                                        category.name
                                                                    }}
                                                                </RouterLink>
                                                            </ul>
                                                        </Transition>
                                                    </div>
                                                </template>
                                                <a
                                                    v-else
                                                    :href="menu.url"
                                                    :target="menu.target"
                                                    class="block text-slate-950 font-medium"
                                                >
                                                    {{ $t(menu.name) }}
                                                </a>
                                            </div>

                                            <div
                                                v-for="link in companyLinks"
                                                :key="link.to"
                                                class="w-full text-base leading-normal"
                                            >
                                                <router-link
                                                    :to="link.to"
                                                    class="text-slate-950 block font-medium"
                                                    @click="mobileMenuOpen = false"
                                                >
                                                    {{ $t(link.name) }}
                                                </router-link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>

    <!-- floating full-width search bar, mobile only, shown once scrolled down -->
    <Transition name="floating-search">
        <form
            v-if="showFloatingSearch"
            @submit.prevent="goToSearch"
            class="fixed top-0 inset-x-0 z-30 flex md:hidden items-center bg-[#0d2d6c] px-4 py-2.5 shadow-md"
        >
            <div class="relative w-full h-11 flex items-center gap-2 bg-neutral-100 rounded-lg overflow-hidden">
                <MagnifyingGlassIcon class="w-5 h-5 text-slate-500 shrink-0 ml-3" />
                <input
                    type="search"
                    name="search"
                    v-model="search"
                    autocomplete="off"
                    @focus="floatingSearchFocused = true"
                    @blur="floatingSearchFocused = false"
                    class="relative z-10 form-control grow h-full inline-block bg-transparent text-slate-700 text-base font-normal outline-none"
                />
                <div
                    v-if="!search && !floatingSearchFocused"
                    class="absolute left-9 right-14 h-5 overflow-hidden pointer-events-none flex items-center"
                >
                    <Transition name="ticker">
                        <span
                            :key="tickerIndex"
                            class="absolute inset-0 flex items-center gap-1.5 text-slate-500 text-sm"
                        >
                            <span>{{ $t("Search for") }}</span>
                            <component
                                :is="searchTickerItems[tickerIndex].icon"
                                class="w-4 h-4 shrink-0"
                                colorClass="text-slate-500"
                            />
                            <span>{{
                                $t(searchTickerItems[tickerIndex].label)
                            }}</span>
                        </span>
                    </Transition>
                </div>
                <button
                    type="submit"
                    class="h-full px-3 bg-neutral-100 border-l-2 border-[#0d2d6c] flex items-center justify-center shrink-0"
                >
                    <RiSearchLine class="w-5 h-5 text-[#0d2d6c]" />
                </button>
            </div>
        </form>
    </Transition>
</template>

<script setup>
import { RiHomeLine, RiMapPinLine } from "vue-remix-icons";
import { RiSearchLine } from "vue-remix-icons";

import {
    Dialog,
    DialogPanel,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import {
    Bars3Icon,
    ChevronRightIcon,
    UserIcon,
    XMarkIcon,
} from "@heroicons/vue/24/outline";
import { MagnifyingGlassIcon } from "@heroicons/vue/24/solid";
import { ref, watch, onMounted, onUnmounted, computed } from "vue";
import { RouterLink, useRoute, useRouter } from "vue-router";
import AuthUserDropdown from "../AuthUserDropdown.vue";
import LoginModal from "../LoginModal.vue";

import { useAuth } from "../../stores/AuthStore";
import { useBasketStore } from "../../stores/BasketStore";
import { useMaster } from "../../stores/MasterStore";
import axios from "axios";
import { ChevronDownIcon } from "@heroicons/vue/20/solid";
import { useTruncateText } from "../../composables/useTruncateText";
import LeafIcon from "../../icons/LeafIcon.vue";
import AppleIcon from "../../icons/AppleIcon.vue";
import MeatIcon from "../../icons/MeatIcon.vue";
import Bag from "../../icons/Bag.vue";
import WishlistIconOutline from "../../icons/WishlistIconOutline.vue";

// apis
const categoryApi = "/categories";

// stores
const route = useRoute();
const router = useRouter();
const basketStore = useBasketStore();

const AuthStore = useAuth();
const master = useMaster();
const { truncate } = useTruncateText();

const search = ref("");
const searchFocused = ref(false);
const floatingSearchFocused = ref(false);

const routerName = ref(route.name);

watch(route, () => {
    routerName.value = route.name;
});

const showCardCanvas = () => {
    mobileMenuOpen.value = false;
    if (!master.basketCanvas) {
        basketStore.fetchCheckoutProducts();
    }
    master.basketCanvas = !master.basketCanvas;
};

const showMyCart = () => {
    mobileMenuOpen.value = false;
    master.basketCanvas = true;
};

const showWishlist = () => {
    mobileMenuOpen.value = false;
    if (!AuthStore.token) {
        return showLoginDialog();
    }
    router.push("/wishlist");
};

watch(
    () => route.path,
    () => {
        mobileMenuOpen.value = false;
        if (route.path == "/products") {
            search.value = master.search;
        } else {
            search.value = "";
        }
    }
);

onMounted(() => {
    if (route.path == "/products") {
        search.value = master.search;
    } else {
        search.value = "";
    }
});

const mobileMenuOpen = ref(false);

const companyLinks = [
    { name: "About Us", to: "/about-us" },
    { name: "Terms & Conditions", to: "/terms-and-conditions" },
    { name: "Privacy Policy", to: "/privacy-policy" },
];

const showLoginDialog = () => {
    mobileMenuOpen.value = false;
    AuthStore.showLoginModal();
};

const searchProducts = () => {
    master.search = search.value;
    if (route.path != "/products") {
        search.value = "";
    }
    router.push({ name: "products" });
};

const allCategories = ref();
const showCategoryDropdown = ref(false);

const getCategories = async () => {
    allCategories.value = master.categories;
};
const goToSearch = (e) => {
    e.preventDefault(); // Prevent default just in case
    const formData = new FormData(e.target);
    const searchValue = formData.get("search");
    console.log(searchValue); // The typed search text
    master.search = searchValue;
    router.push({ name: "products" });
};

onMounted(() => {
    getCategories();
});

// floating search bar (mobile) shown once scrolled past the header
const scrollY = ref(window.scrollY);
const showFloatingSearch = computed(
    () => scrollY.value > 150 || floatingSearchFocused.value
);

const handleScroll = () => {
    scrollY.value = window.scrollY;
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll, { passive: true });
});

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
});

// animated "search for ..." ticker text + icon
const searchTickerItems = [
    { icon: LeafIcon, label: "Vegetables" },
    { icon: AppleIcon, label: "Fruits" },
    { icon: MeatIcon, label: "Meat" },
    { icon: Bag, label: "Grocery" },
];
const tickerIndex = ref(0);
let tickerTimer;

onMounted(() => {
    tickerTimer = setInterval(() => {
        tickerIndex.value =
            (tickerIndex.value + 1) % searchTickerItems.length;
    }, 2200);
});

onUnmounted(() => {
    clearInterval(tickerTimer);
});
</script>

<style scoped>
.router-link-active {
    @apply border-primary text-primary;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.category-menu-enter-active,
.category-menu-leave-active {
    transition: opacity 0.3s ease, max-height 0.3s ease, transform 0.3s ease;
    overflow: hidden;
}

.category-menu-enter-from,
.category-menu-leave-to {
    opacity: 0;
    max-height: 0;
    transform: translateY(10px);
}

.category-menu-enter-to,
.category-menu-leave-from {
    opacity: 1;
    max-height: 500px; /* Adjust this value based on your menu's maximum expected height */
    transform: translateY(0);
}

.ticker-enter-active,
.ticker-leave-active {
    transition: transform 0.4s ease, opacity 0.4s ease;
}

.ticker-enter-from {
    transform: translateY(100%);
    opacity: 0;
}

.ticker-leave-to {
    transform: translateY(-100%);
    opacity: 0;
}

.floating-search-enter-active,
.floating-search-leave-active {
    transition: transform 0.3s ease, opacity 0.3s ease;
}

.floating-search-enter-from,
.floating-search-leave-to {
    transform: translateY(-100%);
    opacity: 0;
}
</style>
