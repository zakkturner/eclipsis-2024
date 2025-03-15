import './bootstrap';
import '../css/app.css';

import {createSSRApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy';
import {OhVueIcon, addIcons} from "oh-vue-icons";
import {FaFacebook, FaTwitter, FaInstagram, FaPhone} from "oh-vue-icons/icons";
import {createPinia} from 'pinia';
import * as FaIcons from "oh-vue-icons/icons/fa";
import posthogPlugin from "./plugins/posthog";
import {gsap} from 'gsap'
import {ScrollTrigger} from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

const Fa = Object.values({...FaIcons});
addIcons(FaFacebook, FaTwitter, FaInstagram, FaPhone)
addIcons(...Fa);
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const pinia = createPinia();
import {register} from 'swiper/element/bundle';

register();
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, App, props, plugin}) {
        return createSSRApp({render: () => h(App, props)})
            .component("VIcon", OhVueIcon)
            .use(plugin)
            .use(pinia)
            .use(posthogPlugin)
            .use(ZiggyVue)
            .provide('gsap', gsap)
            .provide('ScrollTrigger', ScrollTrigger)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
