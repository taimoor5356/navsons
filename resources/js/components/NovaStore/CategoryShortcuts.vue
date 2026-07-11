<template>
    <div class="main-container py-4">
        <div
            class="flex flex-nowrap items-start gap-2 md:gap-2 overflow-x-auto scrollbar-hide"
        >
            <div
                v-for="(item, index) in shortcuts"
                :key="item.name"
                class="shrink-0"
                @mouseenter="openDropdown(index, $event)"
                @mouseleave="scheduleClose"
            >
                <div
                    class="flex flex-col items-center justify-center gap-1 rounded-[5px] border border-white/10 p-2 cursor-pointer"
                    :style="{ backgroundColor: item.color, width: '75px', height: '75px' }"
                    @click="goToCategory(item.name)"
                >
                    <component
                        :is="item.icon"
                        class="w-[2.5rem] h-[2.5rem] text-white shrink-0"
                    />
                    <span
                        class="text-[0.5rem] font-semibold text-white text-center leading-tight uppercase"
                    >
                        {{ $t(item.name) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- hover mega menu, large screens only. Teleported so the row's
             horizontal scroll container can't clip it vertically -->
        <Teleport to="body">
            <div
                v-if="hoveredIndex !== null"
                class="hidden lg:flex fixed bg-white rounded-md shadow-xl border-b-4 overflow-hidden z-50 w-[760px]"
                :style="{
                    top: dropdownPosition.top + 'px',
                    left: dropdownPosition.left + 'px',
                    borderBottomColor: '#0d2d6c',
                }"
                @mouseenter="keepOpen"
                @mouseleave="scheduleClose"
            >
                <div class="w-[70%] p-4">
                    <p class="text-base font-bold text-slate-900 mb-3">
                        {{ $t(shortcuts[hoveredIndex].name) }}
                    </p>
                    <div class="grid grid-cols-8 gap-2">
                        <div
                            v-for="sub in shortcuts[hoveredIndex].items"
                            :key="sub"
                            class="flex flex-col items-center gap-1 cursor-pointer group"
                            @click="goToCategory(sub)"
                        >
                            <div
                                class="w-10 h-10 rounded-md flex items-center justify-center"
                                :style="{ backgroundColor: shortcuts[hoveredIndex].color + '1a' }"
                            >
                                <component
                                    :is="shortcuts[hoveredIndex].icon"
                                    class="w-5 h-5"
                                    :style="{ color: shortcuts[hoveredIndex].color }"
                                />
                            </div>
                            <span
                                class="text-[9px] text-slate-600 text-center leading-tight group-hover:text-primary"
                            >
                                {{ $t(sub) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div
                    class="w-[30%] flex items-center justify-center"
                    :style="{ backgroundColor: shortcuts[hoveredIndex].color }"
                >
                    <component
                        :is="shortcuts[hoveredIndex].icon"
                        class="w-16 h-16 text-white/90"
                    />
                </div>
            </div>
        </Teleport>
    </div>
</template>

<script setup>
import { ref, onUnmounted } from "vue";
import { useRouter } from "vue-router";
import { useMaster } from "../../stores/MasterStore";
import AppleIcon from "../../icons/AppleIcon.vue";
import LeafIcon from "../../icons/LeafIcon.vue";
import MeatIcon from "../../icons/MeatIcon.vue";
import FishIcon from "../../icons/FishIcon.vue";
import BreadIcon from "../../icons/BreadIcon.vue";
import MilkIcon from "../../icons/MilkIcon.vue";
import CupIcon from "../../icons/CupIcon.vue";
import SnowflakeIcon from "../../icons/SnowflakeIcon.vue";
import FlowerIcon from "../../icons/FlowerIcon.vue";
import PawIcon from "../../icons/PawIcon.vue";
import {
    HomeIcon,
    GiftIcon,
    PuzzlePieceIcon,
    SparklesIcon,
    ArchiveBoxIcon,
    BoltIcon,
    WrenchScrewdriverIcon,
} from "@heroicons/vue/24/outline";

const router = useRouter();
const master = useMaster();

const hoveredIndex = ref(null);
const dropdownPosition = ref({ top: 0, left: 0 });
let closeTimer = null;

const DROPDOWN_WIDTH = 760;

const openDropdown = (index, event) => {
    clearTimeout(closeTimer);
    hoveredIndex.value = index;

    const rect = event.currentTarget.getBoundingClientRect();
    let left = rect.left;
    const maxLeft = window.innerWidth - DROPDOWN_WIDTH - 16;
    if (left > maxLeft) {
        left = Math.max(16, maxLeft);
    }

    dropdownPosition.value = { top: rect.bottom + 8, left };
};

const keepOpen = () => {
    clearTimeout(closeTimer);
};

const scheduleClose = () => {
    clearTimeout(closeTimer);
    closeTimer = setTimeout(() => {
        hoveredIndex.value = null;
    }, 150);
};

onUnmounted(() => {
    clearTimeout(closeTimer);
});

const shortcuts = [
    { name: "Quick Meals", icon: BoltIcon, color: "#860202", items: ["Ready to Eat", "Instant Noodles", "Frozen Meals", "Sandwiches", "Salads", "Soups", "Wraps", "Meal Kits"] },
    { name: "Fruits", icon: AppleIcon, color: "#58bb7c", items: ["Apple", "Banana", "Orange", "Grapes", "Mango", "Pear", "Watermelon", "Pineapple"] },
    { name: "Vegetables", icon: LeafIcon, color: "#0a8e3a", items: ["Tomato", "Potato", "Onion", "Carrot", "Spinach", "Cucumber", "Broccoli", "Cabbage"] },
    { name: "Seafood", icon: FishIcon, color: "#0d2d6c", items: ["Salmon", "Shrimp", "Tuna", "Crab", "Prawns", "Squid", "Lobster", "Octopus"] },
    { name: "Meat", icon: MeatIcon, color: "#a60303", items: ["Chicken", "Beef", "Mutton", "Sausages", "Turkey", "Mince", "Lamb", "Bacon"] },
    { name: "Bakery", icon: BreadIcon, color: "#818181", items: ["Bread", "Croissant", "Bagel", "Muffin", "Donut", "Cake", "Baguette", "Pastries"] },
    { name: "Dairy", icon: MilkIcon, color: "#136b86", items: ["Milk", "Cheese", "Yogurt", "Butter", "Cream", "Eggs", "Paneer", "Ghee"] },
    { name: "Pantry", icon: ArchiveBoxIcon, color: "#61a931", items: ["Rice", "Pasta", "Flour", "Sugar", "Oil", "Spices", "Lentils", "Salt"] },
    { name: "Drinks", icon: CupIcon, color: "#00a8d0", items: ["Juice", "Soda", "Water", "Tea", "Coffee", "Energy Drinks", "Milkshake", "Lemonade"] },
    { name: "Frozen", icon: SnowflakeIcon, color: "#85a5b8", items: ["Ice Cream", "Frozen Peas", "Nuggets", "Fries", "Frozen Pizza", "Frozen Fish", "Frozen Corn", "Frozen Berries"] },
    { name: "Home", icon: HomeIcon, color: "#131678", items: ["Cleaning", "Tissues", "Detergent", "Air Freshener", "Trash Bags", "Batteries", "Foil Paper", "Sponges"] },
    { name: "Kids", icon: PuzzlePieceIcon, color: "#1e7958", items: ["Toys", "Diapers", "Baby Food", "Wipes", "Kids Snacks", "Feeding Bottles", "Toothpaste", "Storybooks"] },
    { name: "Selfcare", icon: SparklesIcon, color: "#c20056", items: ["Shampoo", "Soap", "Lotion", "Toothpaste", "Deodorant", "Skincare", "Hair Care", "Sunscreen"] },
    { name: "Gifts", icon: GiftIcon, color: "#d0aa33", items: ["Gift Cards", "Chocolates", "Bouquets", "Greeting Cards", "Candles", "Hampers", "Perfumes", "Gift Wrap"] },
    { name: "Flowers", icon: FlowerIcon, color: "#29950d", items: ["Roses", "Tulips", "Lilies", "Orchids", "Sunflowers", "Bouquets", "Carnations", "Daisies"] },
    { name: "Car Care", icon: WrenchScrewdriverIcon, color: "#37474f", items: ["Engine Oil", "Car Wash", "Air Freshener", "Wax & Polish", "Tyre Care", "Car Accessories", "Batteries", "Cleaning Wipes"] },
    { name: "Pets", icon: PawIcon, color: "#e07b39", items: ["Dog Food", "Cat Food", "Pet Treats", "Litter", "Pet Toys", "Grooming", "Pet Accessories", "Bird Food"] },
];

const goToCategory = (name) => {
    hoveredIndex.value = null;
    master.search = name;
    router.push({ name: "products" });
};
</script>
