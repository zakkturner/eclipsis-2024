import {defineStore} from "pinia";

export const useUiStateStore = defineStore('uiState', {
    state: () => ({
        isMenuOpen: false
    }),
    actions: {
        toggleMenu() {
            this.isMenuOpen = !this.isMenuOpen;
        },
        closeMenu() {
            this.isMenuOpen = false;
        },
        openMenu() {
            this.isMenuOpen = true;
        }
    }
});