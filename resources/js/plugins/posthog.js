import posthog from "posthog-js";

const postHogApiKey = import.meta.env.VITE_POSTHOG_API_KEY
export default {
    install(app) {
        app.config.globalProperties.$posthog = posthog.init(
            // '',
            postHogApiKey,
            {
                api_host: 'https://us.i.posthog.com',
            }
        );
    },
};