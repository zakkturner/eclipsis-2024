import {createSSRApp, h} from 'vue';
import {renderToString} from '@vue/server-renderer';
import {createInertiaApp} from '@inertiajs/vue3';
import createServer from '@inertiajs/vue3/server';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy';
import {gsap} from 'gsap'


import {createPinia} from 'pinia';
import {OhVueIcon, addIcons} from "oh-vue-icons";
// import function to register Swiper custom elements
import {register} from 'swiper/element/bundle';
// register Swiper custom elements

register();

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
const pinia = createPinia();

createServer((page) =>
    createInertiaApp({
        page,
        render: renderToString,
        title: (title) => `${title} - ${appName}`,
        resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
        setup({App, props, plugin}) {
            const app = createSSRApp({
                render: () => h(App, props)
            }, {
                // Add this configuration to tell Vue that swiper elements are custom elements
                compilerOptions: {
                    isCustomElement: tag => ['swiper-container', 'swiper-slide'].includes(tag)
                }
            });

            app.use(pinia)
                .use(plugin)
                .component("VIcon", OhVueIcon)
                .use(ZiggyVue, {
                    ...page.props.ziggy,
                    location: new URL(page.props.ziggy.location),
                })
                .provide("gsap", gsap)

            return app;

        },
    })
);
