import {createApp} from 'vue';

import {router} from "@/route";
import TheHeaderComponent from "@/components/Header/TheHeaderComponent.vue";
import TheFooterComponent from "@/components/TheFooterComponent.vue";
import TheAlertDangerComponent from "@/components/Alert/TheAlertDangerComponent.vue";

import './bootstrap';
import 'flowbite';
import TheAlertSuccessComponent from "@/components/Alert/TheAlertSuccessComponent.vue";
import TheUserHeaderComponent from "@/components/User/Header/TheUserHeaderComponent.vue";

const app = createApp({});

app.component('v-header', TheHeaderComponent);
app.component('v-footer', TheFooterComponent);

app.component('v-alert-danger', TheAlertDangerComponent);
app.component('v-alert-success', TheAlertSuccessComponent)


app.component('v-user-header', TheUserHeaderComponent)

app.use(router);
app.mount('#app');
