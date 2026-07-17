<template>
    <div>
        <!-- Sticky scrollable tab bar -->
        <div
            ref="tabBarEl"
            class="sticky z-10 bg-white border-b border-slate-200 shadow-sm"
            :style="{ top: tabBarOffset + 'px' }"
        >
            <div class="max-w-[1000px] mx-auto px-[7.5px]">
                <div class="flex flex-wrap items-center">
                    <button
                        v-for="tab in tabs"
                        :key="tab.id"
                        type="button"
                        @click="handleTabClick(tab.id)"
                        class="flex-1 px-5 py-3.5 text-sm md:text-base font-medium whitespace-nowrap text-center transition-colors"
                        :class="activeTab === tab.id
                            ? 'bg-primary text-white'
                            : 'text-slate-600 hover:bg-slate-50'"
                    >
                        {{ tab.label }}
                    </button>
                </div>
            </div>
        </div>

        <section id="about-us" :style="{ scrollMarginTop: sectionScrollOffset + 'px' }">
            <div class="max-w-[1000px] mx-auto px-[7.5px] pt-8 md:pt-10">
                <SectionRibbon text="About Us" />
            </div>
            <AboutUs />
            <KeyDivisions />
            <ManagementTeam />
        </section>

        <section id="blogs" :style="{ scrollMarginTop: sectionScrollOffset + 'px' }">
            <div class="max-w-[1000px] mx-auto px-[7.5px] pt-8 md:pt-10">
                <SectionRibbon text="Blogs" />
            </div>
            <Blog />
        </section>

        <section id="contact-us" :style="{ scrollMarginTop: sectionScrollOffset + 'px' }">
            <div class="max-w-[1000px] mx-auto px-[7.5px] pt-8 md:pt-10">
                <SectionRibbon text="Contact Us" />
            </div>
            <ContactUs />
        </section>

        <section id="terms-and-conditions" :style="{ scrollMarginTop: sectionScrollOffset + 'px' }">
            <div class="max-w-[1000px] mx-auto px-[7.5px] pt-8 md:pt-10">
                <SectionRibbon text="Terms & Conditions" />
            </div>
            <TermsAndConditions />
        </section>

        <section id="privacy-policy" :style="{ scrollMarginTop: sectionScrollOffset + 'px' }">
            <div class="max-w-[1000px] mx-auto px-[7.5px] pt-8 md:pt-10">
                <SectionRibbon text="Privacy Policy" />
            </div>
            <PrivacyPolicy />
        </section>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, watch, nextTick } from 'vue';
import { useRoute } from 'vue-router';
import AboutUs from './AboutUs.vue';
import Blog from './Blog.vue';
import ContactUs from './ContactUs.vue';
import TermsAndConditions from './TermsAndConditions.vue';
import PrivacyPolicy from './PrivacyPolicy.vue';
import SectionRibbon from '../components/SectionRibbon.vue';
import KeyDivisions from '../components/KeyDivisions.vue';
import ManagementTeam from '../components/ManagementTeam.vue';

const route = useRoute();

const tabBarEl = ref(null);
const tabBarOffset = ref(0);
const sectionScrollOffset = ref(0);

// Figures out how tall whatever is currently stuck at the top of the
// viewport is (site navbar, which differs by theme/breakpoint), so the
// tab bar can sit flush beneath it instead of a guessed pixel offset.
const measureStickyOffset = () => {
    const probeX = window.innerWidth / 2;
    const probe = document.elementFromPoint(probeX, 1);

    let offset = 0;
    let el = probe;
    while (el && el !== document.body) {
        if (el === tabBarEl.value) {
            el = el.parentElement;
            continue;
        }
        const style = window.getComputedStyle(el);
        if (style.position === 'sticky' || style.position === 'fixed') {
            offset = Math.max(offset, Math.round(el.getBoundingClientRect().bottom));
        }
        el = el.parentElement;
    }

    tabBarOffset.value = offset;
    sectionScrollOffset.value = offset + (tabBarEl.value?.offsetHeight || 56) + 16;
};

let measureTicking = false;
const scheduleMeasure = () => {
    if (measureTicking) return;
    measureTicking = true;
    requestAnimationFrame(() => {
        measureStickyOffset();
        measureTicking = false;
    });
};

const tabs = [
    { id: 'about-us', label: 'About Us' },
    { id: 'blogs', label: 'Blogs' },
    { id: 'contact-us', label: 'Contact Us' },
    { id: 'terms-and-conditions', label: 'Terms & Conditions' },
    { id: 'privacy-policy', label: 'Privacy Policy' },
];

const routeToSection = {
    'about-us': 'about-us',
    blogs: 'blogs',
    'contact-us': 'contact-us',
    'terms-and-conditions': 'terms-and-conditions',
    'privacy-policy': 'privacy-policy',
};

const activeTab = ref(routeToSection[route.name] || 'about-us');

const scrollToSection = (id) => {
    const el = document.getElementById(id);
    if (el) {
        el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
};

// The sections above fetch their content asynchronously, so their height
// keeps changing after the initial navigation. Keep re-snapping to the
// target section until things settle, unless the user starts scrolling.
let autoScrollTarget = null;
let autoScrollTimeout;
let resizeObserver;

const cancelAutoScroll = () => {
    autoScrollTarget = null;
    clearTimeout(autoScrollTimeout);
};

const landOnSection = (id) => {
    autoScrollTarget = id;
    scrollToSection(id);
    clearTimeout(autoScrollTimeout);
    autoScrollTimeout = setTimeout(cancelAutoScroll, 2500);
};

const handleUserScrollIntent = () => {
    if (autoScrollTarget) cancelAutoScroll();
};

const handleTabClick = (id) => {
    cancelAutoScroll();
    activeTab.value = id;
    scrollToSection(id);
};

let observer;

const setupScrollSpy = () => {
    observer?.disconnect();

    observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    activeTab.value = entry.target.id;
                }
            });
        },
        { rootMargin: '-45% 0px -50% 0px', threshold: 0 }
    );

    tabs.forEach((tab) => {
        const el = document.getElementById(tab.id);
        if (el) observer.observe(el);
    });
};

onMounted(() => {
    nextTick(() => {
        measureStickyOffset();
        setupScrollSpy();
        landOnSection(routeToSection[route.name] || 'about-us');
    });

    resizeObserver = new ResizeObserver(() => {
        scheduleMeasure();
        if (autoScrollTarget) {
            scrollToSection(autoScrollTarget);
        }
    });
    resizeObserver.observe(document.body);

    window.addEventListener('wheel', handleUserScrollIntent, { passive: true });
    window.addEventListener('touchmove', handleUserScrollIntent, { passive: true });
    window.addEventListener('resize', scheduleMeasure, { passive: true });
    window.addEventListener('scroll', scheduleMeasure, { passive: true });
});

watch(
    () => route.name,
    (name) => {
        activeTab.value = routeToSection[name] || 'about-us';
        nextTick(() => landOnSection(activeTab.value));
    }
);

onBeforeUnmount(() => {
    observer?.disconnect();
    resizeObserver?.disconnect();
    clearTimeout(autoScrollTimeout);
    window.removeEventListener('wheel', handleUserScrollIntent);
    window.removeEventListener('touchmove', handleUserScrollIntent);
    window.removeEventListener('resize', scheduleMeasure);
    window.removeEventListener('scroll', scheduleMeasure);
});
</script>
