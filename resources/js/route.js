import {createRouter, createWebHistory} from "vue-router";

import TheHomeComponent from "@/components/TheHomeComponent.vue";
import TheNewsComponent from "@/components/TheNewsComponent.vue";
import ThePostComponent from "@/components/ThePostComponent.vue";
import routerBeforeEach from "@/router/beforeEach.js";
import TheUserComponent from "@/components/TheUserComponent.vue";
import NotFound404Component from "@/components/NotFound/NotFound404Component.vue";
import TheCreateNewsComponent from "@/components/User/News/TheCreateNewsComponent.vue";
import TheSettingsIndexComponent from "@/components/User/Settings/TheSettingsIndexComponent.vue";
import TheSettingsAvatarComponent from "@/components/User/Settings/TheSettingsAvatarComponent.vue";
import TheSettingsPasswordComponent from "@/components/User/Settings/TheSettingsPasswordComponent.vue";

const routes = [
    {path: '/', component: TheHomeComponent, meta: {title: 'Главная'}, name: 'index'},
    {path: '/news', component: TheNewsComponent, meta: {title: 'Новости'}, name: 'news'},
    {path: '/news/post/:page', component: ThePostComponent, meta: {title: 'Новости'}, name: 'news_page'},

    {path: '/:pathMatch(.*)*', component: NotFound404Component, meta: {title: 'Страница не найдена'}},

    {path: '/user/news/create', component: TheCreateNewsComponent, meta: {title: 'Создать новости', auth: true}, name: 'news_create'},
    {path: '/user', component: TheUserComponent, meta: {auth: true, title: 'Профиль'}, name: 'profile'},

    {path: '/user/settings', component: TheSettingsIndexComponent, meta: {title: 'Настройки', auth: true}},
    {path: '/user/settings/avatar', component: TheSettingsAvatarComponent, meta: {title: 'Настройки', auth: true}},
    {path: '/user/settings/password', component: TheSettingsPasswordComponent, meta: {title: 'Настройки', auth: true}},
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

router.beforeEach(routerBeforeEach);

export {router};
