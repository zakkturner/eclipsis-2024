import posthog from "posthog-js";

export default {
    install(app) {
        app.config.globalProperties.$posthog = posthog.init(
            'phc_4F2tgyKpxNM7eO9cEpMov6B4d0XrQwDKJcc1yuXJd3P',
            {
                api_host: 'https://us.i.posthog.com',
            }
        );
    },
};