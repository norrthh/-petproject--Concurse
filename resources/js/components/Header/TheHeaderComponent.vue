<template>
    <header>
        <div class="container mx-auto">
            <div class="flex">
                <div class="logo">
                    <img src="/images/logo.png" alt="">
                </div>

                <div class="flex w-full navbar" style="margin-top: 10px">
                    <div class="ml-10">
                        <router-link class="mr-5" v-for="nav in navs" :to="nav.path">{{ nav.title }}</router-link>
                    </div>

                    <div class="ml-auto flex">
                        <a href="https://vk.com/club216931602" class="hover:fill-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1.1rem" class="mr-5">
                                <path
                                    d="M484.7 132c3.56-11.28 0-19.48-15.75-19.48h-52.37c-13.21 0-19.31 7.18-22.87 14.86 0 0-26.94 65.6-64.56 108.13-12.2 12.3-17.79 16.4-24.4 16.4-3.56 0-8.14-4.1-8.14-15.37V131.47c0-13.32-4.06-19.47-15.25-19.47H199c-8.14 0-13.22 6.15-13.22 12.3 0 12.81 18.81 15.89 20.84 51.76V254c0 16.91-3 20-9.66 20-17.79 0-61-66.11-86.92-141.44C105 117.64 99.88 112 86.66 112H33.79C18.54 112 16 119.17 16 126.86c0 13.84 17.79 83.53 82.86 175.77 43.21 63 104.72 96.86 160.13 96.86 33.56 0 37.62-7.69 37.62-20.5v-47.66c0-15.37 3.05-17.93 13.73-17.93 7.62 0 21.35 4.09 52.36 34.33C398.28 383.6 404.38 400 424.21 400h52.36c15.25 0 22.37-7.69 18.3-22.55-4.57-14.86-21.86-36.38-44.23-62-12.2-14.34-30.5-30.23-36.09-37.92-7.62-10.25-5.59-14.35 0-23.57-.51 0 63.55-91.22 70.15-122"
                                    fill-rule="evenodd"></path>
                            </svg>
                        </a>

                        <button id="dropdownAvatarNameButton"
                                class="flex items-center hover:text-blue-600 -mt-5" type="button" v-show="statusAuth">
                            <img class="w-8 h-8 mr-2 rounded-full" :src="avatarUser">
                            {{ nicknameUser }}
                        </button>
                        <div id="dropdownAvatarName"
                             class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 -mt-10"
                             aria-labelledby="dropdownAvatarNameButton" v-show="statusAuth">

                            <ul class="py-2 text-base text-gray-700 dark:text-gray-200" style="padding: 0.25rem 0.5rem">
                                <li>
                                    <router-link to="/user/settings"
                                       class="block px-4 py-2 " style="font-size:1rem !important;">Настройки</router-link>
                                </li>

                                <li>
                                    <router-link to="/user/news/create"
                                                 class="block px-4 py-2 " style="font-size:1rem !important;">Cоздать
                                        новости
                                    </router-link>
                                </li>
                            </ul>

                            <div class="py-2" style="padding: 0.25rem 0.5rem">
                                <a href="#"
                                   class="block px-4 py-2" style="font-size:1rem !important;">Выйти</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex" v-if="!statusAuth">
                    <button
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button" @click="showModal">
                        Авторизация
                    </button>
                </div>

                <!--                <button type="button" data-dropdown-toggle="language-dropdown-menu"-->
                <!--                        class="inline-flex items-center font-medium justify-center text-base text-gray-900 dark:text-white rounded-lg cursor-pointer">-->
                <!--                    <img src="/images/language/USA.png" alt="" class="w-8 h-8 rounded-2xl mr-1">-->
                <!--                    Пендосский-->
                <!--                </button>-->

                <!--                <div-->
                <!--                    class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700"-->
                <!--                    id="language-dropdown-menu">-->
                <!--                    <ul class="pt-2 font-medium" role="none">-->
                <!--                        <li>-->
                <!--                            <a href="#"-->
                <!--                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg"-->
                <!--                               role="menuitem">-->
                <!--                                <div class="inline-flex items-center">-->
                <!--                                    <img src="/images/language/tatarstan.svg" alt="" class="w-8 h-8 rounded-2xl mr-1">-->
                <!--                                    Татарский-->
                <!--                                </div>-->
                <!--                            </a>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <a href="#"-->
                <!--                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg"-->
                <!--                               role="menuitem">-->
                <!--                                <div class="inline-flex items-center">-->
                <!--                                    <img src="/images/language/RU.png" alt="" class="w-8 h-8 rounded-2xl mr-1">-->
                <!--                                    Русский-->
                <!--                                </div>-->
                <!--                            </a>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <a href="#"-->
                <!--                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg"-->
                <!--                               role="menuitem">-->
                <!--                                <div class="inline-flex items-center">-->
                <!--                                    <img src="/images/language/USA.png" alt="" class="w-8 h-8 rounded-2xl mr-1">-->
                <!--                                    Пендосский-->
                <!--                                </div>-->
                <!--                            </a>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <a href="#"-->
                <!--                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg"-->
                <!--                               role="menuitem">-->
                <!--                                <div class="inline-flex items-center">-->
                <!--                                    <img src="/images/language/UA.png" alt="" class="w-8 h-8 rounded-2xl mr-1">-->
                <!--                                    Окраинcкий-->
                <!--                                </div>-->
                <!--                            </a>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </div>-->
            </div>
        </div>
    </header>

    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Авторизуйтесь в нашу
                        платформу</h3>

                    <form class="space-y-6">
                        <div>
                            <label for="email" class="label__auth">Ваш
                                эмейл</label>
                            <input type="email" name="email" id="email"
                                   class="fixInput"
                                   placeholder="name@galem.com" v-model="email">
                        </div>

                        <div>
                            <label for="password" class="label__auth">Ваш
                                пароль</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                   class="fixInput"
                                   v-model="password">
                        </div>

                        <button type="button"
                                class="btn__auth"
                                @click="auth">
                            Войти
                        </button>

                        <v-alert-danger :message="messageAlert" v-if="statusAlert"></v-alert-danger>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import {Modal, Dropdown} from 'flowbite';

    export default {
        name: "TheHeaderComponent",

        data() {
            return {
                navs: [
                    {
                        'path': '/',
                        'title': 'Главная'
                    },
                    {
                        'path': '/news',
                        'title': 'Новости'
                    },
                ],

                email: '',
                password: '',

                messageAlert: '',

                statusAlert: false,
                statusAuth: false,

                nicknameUser: 'Авторизуйтесь',
                avatarUser: '',
            }
        },
        methods: {
            auth() {
                if (this.email === '' || this.password === '') {
                    this.showAlert('Заполните все поля')
                    return 0;
                }

                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/v1/login', {
                        email: this.email,
                        password: this.password
                    })
                        .then(res => {
                            localStorage.setItem('api_token', res.data.token)

                            window.location.href = "/user";

                            localStorage.setItem('account_name', res.data.user.name)
                            localStorage.setItem('account_id', res.data.user.id)
                            localStorage.setItem('account_avatar', res.data.user.avatar)
                            localStorage.setItem('account', JSON.stringify(res.data.user))

                            this.statusAuth = true;

                            this.nicknameUser = localStorage.getItem('account_name')
                            this.avatarUser = localStorage.getItem('account_avatar')

                            window.location.href = "/user";
                        })

                        .catch(error => {
                            if (error.response.statusText === 'Unauthorized') {
                                this.showAlert(error.response.data.message)
                                return 0;
                            }
                        })
                })
            },
            showModal() {
                const $targetEl = document.getElementById('authentication-modal');

                const options = {
                    backdrop: 'dynamic',
                    backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
                    closable: true,
                };

                const modal = new Modal($targetEl, options);
                modal.show()
            },
            showAlert(text) {
                this.messageAlert = text;
                this.statusAlert = true;
            },
            checkAuth() {
                axios.get('/sanctum/csrf-cookie')
                    .then(response => {
                        axios.get('/api/v1/user/checkAuth', {
                            headers: {
                                Authorization: 'Bearer ' + localStorage.getItem('api_token')
                            }
                        })
                            .then(res => {
                                this.statusAuth = true;
                                this.nicknameUser = localStorage.getItem('account_name')
                                this.avatarUser = localStorage.getItem('account_avatar')
                            })
                    });
                // }
            },
            dropdownUser() {
                const $targetEl = document.getElementById('dropdownAvatarName');
                const $triggerEl = document.getElementById('dropdownAvatarNameButton');

                const options = {
                    placement: 'bottom',
                    triggerType: 'click',
                    offsetSkidding: 0,
                    offsetDistance: 10,
                    delay: 300,
                };

                const dropdown = new Dropdown($targetEl, $triggerEl, options);
            },
        },
        mounted() {
            this.checkAuth()
            this.dropdownUser()


            setInterval(() => {
                if (localStorage.getItem('account_name')) {
                    this.avatarUser = localStorage.getItem('account_avatar');
                    this.nicknameUser = localStorage.getItem('account_name')
                }
            }, 5000);

        },
    }
</script>
<style scoped>
header {
    margin-top: 20px;
}

header .navbar {
    margin-top: 10px;
}

header .navbar a {
    color: #152C5B;
    margin-right: 10px;
    font-size: 14pt !important;
    @apply hover:text-blue-500 text-base transition
}

header .navbar .router-link-active {
    color: #3252DF;
}


.label__auth {
    @apply block mb-2 text-sm font-medium text-gray-900 dark:text-white
}

.btn__auth {
    @apply w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
}
</style>
