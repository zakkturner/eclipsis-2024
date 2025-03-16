import {App} from "vue";
import {gsap} from "gsap";
import {ScrollTrigger} from "gsap/ScrollTrigger";


export default {
    install(app: App) {
        const plugins = {
            ScrollTrigger: ScrollTrigger,

        };

        gsap.registerPlugin(ScrollTrigger);

        app.config.globalProperties.$gsap = gsap;
        app.config.globalProperties.$gsapPlugins = plugins;

        app.provide("$gsap", gsap);
        app.provide("$gsapPlugins", plugins);
    },
};

declare module "@vue/runtime-core" {
    interface ComponentCustomProperties {
        $gsap: typeof gsap;
        $gsapPlugins: {
            ScrollTrigger: typeof ScrollTrigger;

        };
    }
}