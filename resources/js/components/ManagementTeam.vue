<template>
    <div class="max-w-[1000px] mx-auto px-[7.5px] pt-10 md:pt-14">
        <SectionRibbon text="Management Team" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mt-6">
            <div
                v-for="member in team"
                :key="member.name"
                class="bg-slate-50 rounded-xl overflow-hidden"
            >
                <div class="w-full h-56 md:h-64 bg-slate-200 flex items-center justify-center overflow-hidden">
                    <img
                        v-if="member.image"
                        :src="member.image"
                        :alt="member.name"
                        class="w-full h-full object-cover"
                    />
                    <img
                        v-else
                        :src="profileIcon"
                        :alt="member.name"
                        class="w-20 h-20 opacity-40"
                    />
                </div>
                <div class="p-5">
                    <div class="font-bold text-primary uppercase text-sm tracking-wide">
                        {{ member.name }}
                    </div>
                    <div class="mt-1 pb-2 border-b" style="border-color: #a20d32;">
                        <div
                            v-for="role in member.roles"
                            :key="role"
                            class="text-xs font-semibold uppercase tracking-wide"
                            style="color: #a20d32;"
                        >
                            {{ role }}
                        </div>
                    </div>
                    <p class="text-slate-700 text-sm leading-relaxed mt-3">
                        {{ member.bio }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import SectionRibbon from './SectionRibbon.vue';

const profileIcon = '/assets/icons/profile.svg';

const team = [
    {
        name: 'Ghulam Ali Naveed',
        roles: ['Founder', 'CEO'],
        image: '/assets/ghulam_ali_naveed.png',
        bio: 'Ghulam Ali Naveed - a Masters in Economics and Project Management, with 12 years of professional experience in the UAE. He founded Navsons to bring fresh, reliable grocery delivery to families across Islamabad and Rawalpindi, and as Founder and CEO, continues to guide the company\'s overall vision and long-term direction.',
    },
    {
        name: 'Muhammad Arslan Naveed',
        roles: ['CMO'],
        image: '/assets/arslan.png',
        bio: 'As Chief Marketing Officer, Arslan leads Navsons\' marketing and brand strategy, drawing on a background in software engineering to bring a technically-informed approach to growth. He drives customer engagement and brand presence as the company scales.',
    },
    {
        name: 'Zain ul Abideen',
        roles: ['COO'],
        image: '/assets/zain_ul_abideen.png',
        bio: 'As Chief Operating Officer, Zain oversees the day-to-day running of Navsons — from order fulfilment to delivery — keeping operations smooth, consistent and dependable as the business continues to grow.',
    },
    {
        name: 'Muhammad Taimoor Naveed',
        roles: ['CTO'],
        image: '/assets/my_picture.png',
        bio: 'A software engineer leading Navsons\' technology as CTO, Taimoor owns the e-commerce platform end-to-end while staying closely involved across operations, branding and marketing — making sure every part of the business runs on solid technical foundations.',
    },
];
</script>
