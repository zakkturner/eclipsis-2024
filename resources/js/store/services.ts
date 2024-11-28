import {defineStore} from "pinia";
import { Service} from "@/types/types";

export const useServicesStore = defineStore('servicesState', {
    state: ()  => ({
        services: []
    }),


    actions: {
            setServices(services: Service[]){
                this.services = services;
        }
    }
})