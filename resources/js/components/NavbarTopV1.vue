<template>
    <div class="bg-navbar hidden md:block" :style="{ backgroundColor: '#0d2d6c' }">
        <div
            class="main-container py-1.5 gap-[6px] text-white"
            :class="
                master.langDirection == 'rtl'
                    ? 'flex flex-row justify-between items-center flex-row-reverse'
                    : 'flex flex-row justify-between items-center'
            "
        >
            <div
                class="flex items-center justify-between md:justify-start gap-4 w-full"
            >
                <div
                    class="text-white text-sm font-normal leading-tight flex items-center gap-2"
                >
                    <span
                        class="w-[16px] h-[16px] md:w-5 md:h-5 flex justify-center items-center shrink-0"
                    >
                        <DeliveryTruckIcon class="w-full h-full text-white" />
                    </span>
                    <span class="text-[8px]  lg:text-sm font-normal  lg:font-light font-['Inter'] leading-[8px] lg:leading-snug whitespace-nowrap"
                        >{{ $t("Delivery All Over ISB") }}</span
                    >
                </div>

                <div class="w-px h-4 bg-white/60 shrink-0"></div>

                <RouterLink
                    to="/manage-address/new"
                    class="flex items-center gap-1.5 text-white text-[8px] lg:text-sm font-normal leading-tight border border-white/40 rounded-full px-3 py-1 bg-transparent hover:bg-white/10 transition-colors whitespace-nowrap"
                >
                    <MapPinIcon class="w-3.5 h-3.5 lg:w-4 lg:h-4 shrink-0" />
                    {{ $t("Add Your Address") }}
                </RouterLink>
            </div>

            <div
                class="flex items-center justify-between md:justify-end gap-3 w-full"
            >

                <Menu as="div" class="relative inline-block text-left">
                    <MenuButton
                        class="flex items-center gap-1.5 text-white text-xs md:text-sm font-normal leading-snug whitespace-nowrap"
                    >
                        {{ $t("Sustainable Grocery Shopping") }}
                        <ChevronDownIcon class="w-4 h-4" aria-hidden="true" />
                    </MenuButton>

                    <transition
                        enter-active-class="transition ease-out duration-100"
                        enter-from-class="transform opacity-0 scale-95"
                        enter-to-class="transform opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-75"
                        leave-from-class="transform opacity-100 scale-100"
                        leave-to-class="transform opacity-0 scale-95"
                    >
                        <MenuItems
                            class="absolute z-50 w-56 mt-[0.65rem] origin-top-right rounded-none bg-white shadow-lg focus:outline-none max-h-96 overflow-y-auto"
                            :class="
                                master.langDirection == 'rtl'
                                    ? 'left-0'
                                    : 'right-0'
                            "
                        >
                            <div class="py-1">
                                <MenuItem
                                    v-for="link in navLinks"
                                    v-slot="{ active }"
                                    :key="link.name"
                                >
                                    <RouterLink
                                        :to="link.to"
                                        class="block w-full text-left"
                                        :class="[
                                            active
                                                ? 'text-primary font-bold'
                                                : 'text-gray-700',
                                            'block px-4 py-[7.5px] text-xs',
                                        ]"
                                    >
                                        {{ $t(link.name) }}
                                    </RouterLink>
                                </MenuItem>
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>

                <div class="w-px h-4 bg-white/60"></div>

                <a
                    href="tel:+923000055563"
                    class="flex items-center gap-1.5 text-white text-xs md:text-sm font-normal leading-snug whitespace-nowrap"
                >
                    <PhoneIcon class="w-4 h-4" />
                    +923000055563
                </a>

                <div class="w-px h-4 bg-white/60"></div>

                <Menu
                    as="div"
                    class="relative inline-block text-left bg-[#0d2d6c] px-1 py-1.5 rounded"
                >
                    <div>
                        <MenuButton
                            class="flex justify-between items-center text-white gap-2 text-xs md:text-sm font-normal leading-tight"
                        >
                            <span class="uppercase font-semibold">{{ currentLanguage?.name }}</span>
                            <ChevronDownIcon
                                class="w-4 h-4 "
                                aria-hidden="true"
                            />
                        </MenuButton>
                    </div>

                    <transition
                        enter-active-class="transition ease-out duration-100"
                        enter-from-class="transform opacity-0 scale-95"
                        enter-to-class="transform opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-75"
                        leave-from-class="transform opacity-100 scale-100"
                        leave-to-class="transform opacity-0 scale-95"
                    >
                        <MenuItems
                            class="absolute z-50 w-20 mt-1 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            :class="
                                master.langDirection == 'rtl'
                                    ? 'left-0'
                                    : 'right-0'
                            "
                        >
                            <div class="py-1">
                                <MenuItem
                                    v-for="language in master.languages"
                                    v-slot="{ active }"
                                    :key="language.id"
                                >
                                    <button
                                        type="button"
                                        @click="
                                            setCurrentLanguage(language.name);
                                            reloadPage();
                                        "
                                        class="w-full text-left uppercase font-semibold"
                                        :class="[
                                            active
                                                ? 'bg-gray-100 text-gray-900'
                                                : 'text-gray-700',
                                            'px-4 py-2 text-xs',
                                        ]"
                                    >
                                        {{ language.name }}
                                    </button>
                                </MenuItem>
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>

                
            </div>
        </div>
    </div>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import { ChevronDownIcon } from "@heroicons/vue/20/solid";
import { MapPinIcon, PhoneIcon } from "@heroicons/vue/24/outline";
import { RouterLink } from "vue-router";
import DeliveryTruckIcon from "../icons/DeliveryTruckIcon.vue";
import localization from "../localization";

import { useMaster } from "../stores/MasterStore";
import { onMounted, ref, watch } from "vue";
const master = useMaster();

const currentLanguage = ref("English");

const navLinks = [
    { name: "Home", to: "/" },
    { name: "Categories", to: "/categories" },
    { name: "Products", to: "/products" },
    { name: "Most Popular", to: "/most-popular" },
    { name: "Best Deals", to: "/best-deal" },
    { name: "About Us", to: "/about-us" },
    { name: "Contact", to: "/contact-us" },
    { name: "Blogs", to: "/blogs" },
    { name: "Terms & Conditions", to: "/terms-and-conditions" },
    { name: "Privacy Policy", to: "/privacy-policy" },
];

onMounted(() => {
    setCurrentLanguage(master.locale);
});

watch(
    () => master.locale,
    (oldValue, newValue) => {
        if (oldValue !== newValue) {
            setCurrentLanguage(master.locale);
        }
    }
);

const setCurrentLanguage = (lang) => {
    master.locale = lang;
    localStorage.setItem("locale", lang);

    const language = master.languages.find(
        (lang) => lang.name === master.locale
    );
    if (language) {
        currentLanguage.value = language;
        master.langDirection = language.direction || "ltr";
    }
    localization.fetchLocalizationData();
};

const reloadPage = () => {
    window.location.reload();
};
</script>
