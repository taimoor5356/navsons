<template>
    <div>
        <!-- Sticky scrollable tab bar -->
        <div class="sticky top-16 md:top-24 z-10 bg-white border-b border-slate-200 shadow-sm">
            <div class="main-container">
                <div class="flex flex-wrap justify-between items-center">
                    <button
                        v-for="tab in tabs"
                        :key="tab.id"
                        type="button"
                        @click="handleTabClick(tab.id)"
                        class="px-5 py-3.5 text-sm md:text-base font-medium whitespace-nowrap transition-colors"
                        :class="activeTab === tab.id
                            ? 'bg-primary text-white'
                            : 'text-slate-600 hover:bg-slate-50'"
                    >
                        {{ tab.label }}
                    </button>
                </div>
            </div>
        </div>

        <section id="about-us" class="scroll-mt-[112px] md:scroll-mt-[152px]">
            <div class="main-container pt-8 md:pt-10">
                <SectionRibbon text="About Us" />
            </div>
            <AboutUs />
            <KeyDivisions />
            <ManagementTeam />
        </section>

        <section id="blogs" class="scroll-mt-[112px] md:scroll-mt-[152px]">
            <div class="main-container pt-8 md:pt-10">
                <SectionRibbon text="Blogs" />
            </div>
            <Blog />
        </section>

        <section id="contact-us" class="scroll-mt-[112px] md:scroll-mt-[152px]">
            <div class="main-container pt-8 md:pt-10">
                <SectionRibbon text="Contact Us" />
            </div>
            <ContactUs />
        </section>

        <section id="terms-and-conditions" class="scroll-mt-[112px] md:scroll-mt-[152px]">
            <div class="main-container pt-8 md:pt-10">
                <SectionRibbon text="Terms & Conditions" />
            </div>
            <TermsAndConditions />
        </section>

        <section id="privacy-policy" class="scroll-mt-[112px] md:scroll-mt-[152px]">
            <div class="main-container pt-8 md:pt-10">
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
        setupScrollSpy();
        landOnSection(routeToSection[route.name] || 'about-us');
    });

    resizeObserver = new ResizeObserver(() => {
        if (autoScrollTarget) {
            scrollToSection(autoScrollTarget);
        }
    });
    resizeObserver.observe(document.body);

    window.addEventListener('wheel', handleUserScrollIntent, { passive: true });
    window.addEventListener('touchmove', handleUserScrollIntent, { passive: true });
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
});
</script>
