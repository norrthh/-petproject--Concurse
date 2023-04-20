import {createApp} from 'vue';

import {router} from "@/route";
import TheHeaderComponent from "@/components/Header/TheHeaderComponent.vue";
import TheFooterComponent from "@/components/TheFooterComponent.vue";
import TheAlertDangerComponent from "@/components/Alert/TheAlertDangerComponent.vue";

import './bootstrap';
import 'flowbite';
import TheAlertSuccessComponent from "@/components/Alert/TheAlertSuccessComponent.vue";

const app = createApp({});

app.component('v-header', TheHeaderComponent);
app.component('v-footer', TheFooterComponent);

app.component('v-alert-danger', TheAlertDangerComponent);
app.component('v-alert-success', TheAlertSuccessComponent)

app.use(router);
app.mount('#app');
