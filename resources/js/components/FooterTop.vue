<template>
    <footer class="container-2 px-4 pt-6 2xl:px-0 lg:pt-0 relative z-10">
        <!-- Footer Wrapper Start -->
        <div class="footer__wrapper">
            <!-- Footer Widget -->
            <div class="footer__widget">
                <!-- <h4 class="widget__title">{{ $t("Contact") }}</h4> -->
                <ul class="widget__list">
                    <li
                        class="max-w-[400px] pb-4 border-b font-semibold"
                        style="color: #28a745; border-color: #28a745;"
                    >
                        PREMIUM PRODUCT DELIVERED,<br />
                        ANYWHERE IN THE ISLAMABAD
                    </li>
                    <li>
                        <span class="icon">
                            <MapPin
                                width="22"
                                height="22"
                                :colorClass="'zinc-400 fill-current'"
                            />
                        </span>
                        <p>{{ master.address }}</p>
                    </li>

                    <template v-for="aboutCompany in master?.footers[0]?.items">
                        <li
                            v-if="
                                aboutCompany.type == 'email' ||
                                aboutCompany.type == 'phone'
                            "
                            class="cursor-pointer"
                        >
                            <span class="icon">
                                <Phone
                                    v-if="aboutCompany.type == 'phone'"
                                    width="24"
                                    height="24"
                                    :colorClass="'zinc-400 fill-current'"
                                />
                                <MessageIcon
                                    v-if="aboutCompany.type == 'email'"
                                    width="24"
                                    height="24"
                                    :colorClass="'zinc-400 fill-current'"
                                />
                            </span>
                            <a :href="aboutCompany.url">{{
                                aboutCompany.title
                            }}</a>
                        </li>
                    </template>

                    <li v-if="master.socialLinks?.length" class="flex items-center gap-4">
                        <a
                            v-for="socialLink in master.socialLinks"
                            :key="socialLink.name"
                            :href="socialLink.link"
                            target="_blank"
                            rel="noopener noreferrer"
                            :title="socialLink.name"
                        >
                            <component
                                :is="getSocialIcon(socialLink.name)"
                                width="22"
                                height="22"
                                :colorClass="'zinc-400 fill-current'"
                            />
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Footer Widget -->
            <div v-for="subsection in footerSubsections" class="footer__widget">
                <h4
                    class="widget__title pb-2 border-b"
                    style="color: #28a745; border-color: #28a745;"
                >
                    {{ $t(subsection.title) }}
                </h4>
                <ul class="widget__list">
                    <li v-for="item in subsection.items">
                        <a
                            v-if="item.target == '_blank'"
                            :href="item.url"
                            target="_blank"
                            rel="noopener noreferrer"
                            >{{ $t(item.title) }}</a
                        >
                        <RouterLink v-else :to="item.url">{{
                            $t(item.title)
                        }}</RouterLink>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</template>

<script setup>
import {
    RiHomeLine,
    RiMailLine,
    RiMapPinLine,
    RiPhoneLine,
} from "vue-remix-icons";
import { onMounted, onBeforeUnmount, ref } from "vue";
import { ChevronDownIcon } from "@heroicons/vue/24/solid";

import { useMaster } from "../stores/MasterStore";
import { RouterLink } from "vue-router";
import { computed } from "vue";
import MapPin from "../icons/MapPin.vue";
import Phone from "../icons/Phone.vue";
import MessageIcon from "../icons/Message.vue";
import FacebookIcon from "../icons/FacebookIcon.vue";
import InstagramIcon from "../icons/InstagramIcon.vue";
import TwitterIcon from "../icons/TwitterIcon.vue";
import YoutubeIcon from "../icons/YoutubeIcon.vue";
import LinkedinIcon from "../icons/LinkedinIcon.vue";
import WhatsappIcon from "../icons/WhatsappIcon.vue";
import GlobeIcon from "../icons/GlobeIcon.vue";
const master = useMaster();

const getSocialIcon = (name) => {
    const key = (name || "").toLowerCase();
    if (key.includes("facebook")) return FacebookIcon;
    if (key.includes("instagram")) return InstagramIcon;
    if (key.includes("twitter") || key.includes("x.com") || key === "x")
        return TwitterIcon;
    if (key.includes("youtube")) return YoutubeIcon;
    if (key.includes("linkedin")) return LinkedinIcon;
    if (key.includes("whatsapp")) return WhatsappIcon;
    return GlobeIcon;
};

const [item0, item1, item2, item3] = [
    ref(false),
    ref(false),
    ref(false),
    ref(false),
];

const isLargeScreen = ref(window.innerWidth >= 640);

const footerSubsections = computed(() => {
    let otherFooterSection = master.footers.slice(1, -1);
    return otherFooterSection;
});

onMounted(() => {
    window.addEventListener("resize", handleResize);
});

onBeforeUnmount(() => {
    window.removeEventListener("resize", handleResize);
});

const checkOpen = (index) => {
    const items = [item0, item1, item2, item3];
    return items[index]?.value || false;
};

const handleResize = () => {
    isLargeScreen.value = window.innerWidth >= 640;
    if (isLargeScreen.value) {
        item0.value = item1.value = item2.value = item3.value = true;
    } else {
        item0.value = item1.value = item2.value = item3.value = false;
    }
};

const toggleLinks = (index) => {
    switch (index) {
        case 0:
            item0.value = !item0.value;
            break;
        case 1:
            item1.value = !item1.value;
            break;
        case 2:
            item2.value = !item2.value;
            break;
        case 3:
            item3.value = !item3.value;
            break;
    }
};

const appStore = () => {
    if (master.appStoreLink) {
        window.open(master.appStoreLink, "_blank");
    }
};

const playStore = () => {
    if (master.playStoreLink) {
        window.open(master.playStoreLink, "_blank");
    }
};
</script>
<style scoped>
.slide-enter-active,
.slide-leave-active {
    transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
}

.slide-enter-from,
.slide-leave-to {
    max-height: 0;
    opacity: 0;
}

.slide-enter-to,
.slide-leave-from {
    max-height: 500px;
    opacity: 1;
}

.footer__wrapper {
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: start;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    gap: 30px;
}
@media screen and (max-width: 320px) {
    .footer__wrapper {
        flex-direction: column;
    }
}
.footer__wrapper .footer__widget .widget__title {
    font-weight: 800;
    font-size: 20px;
    line-height: 28px;
    display: inline-block;
    color: white;
    position: relative;
    margin-bottom: 16px;
    text-transform: uppercase;
}
.footer__wrapper .footer__widget .widget__list li {
    list-style: none;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: baseline;
    -ms-flex-align: baseline;
    align-items: baseline;
    margin-bottom: 12px;
    font-family: var(--font-default);
    font-weight: var(--font-regular);
    font-size: 16px;
    line-height: 24px;
    color: rgba(var(--color-white-rgb), 0.7);
    display: flex;
    align-items: center;
    gap: 14px;
}
.footer__wrapper .footer__widget .widget__list li:last-of-type {
    margin-bottom: 0;
}
.footer__wrapper .footer__widget .widget__list li a {
    color: currentColor;
    text-decoration: none;
    -webkit-transition: var(--transition);
    transition: var(--transition);
}
.footer__wrapper .footer__widget .widget__list li a:hover {
    color: #fff !important;
}
.footer__wrapper .footer__widget .widget__list li i {
    font-size: 20px;
    width: 24px;
    height: 24px;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    color: var(--primary);
}
</style>
