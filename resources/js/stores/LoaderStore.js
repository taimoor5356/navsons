import { defineStore } from "pinia";

const MIN_VISIBLE_MS = 500;

export const useLoaderStore = defineStore("loaderStore", {
    state: () => ({
        pageLoading: false,
        startedAt: 0,
        hideTimer: null,
    }),
    actions: {
        start() {
            clearTimeout(this.hideTimer);
            this.startedAt = Date.now();
            this.pageLoading = true;
        },
        finish() {
            const elapsed = Date.now() - this.startedAt;
            const remaining = MIN_VISIBLE_MS - elapsed;

            clearTimeout(this.hideTimer);
            if (remaining > 0) {
                this.hideTimer = setTimeout(() => {
                    this.pageLoading = false;
                }, remaining);
            } else {
                this.pageLoading = false;
            }
        },
    },
});
