<template>
    <div class="container mx-auto pt-16 pb-32">
        <div class="flex">
            <v-user-header></v-user-header>

            <div class="contentSettings">

                <v-alert-danger class="w-full" :message="alertDangerMessage" v-if="alertDangerMessage"></v-alert-danger>
                <v-alert-success class="w-full" :message="alertSuccessMessage" v-if="alertSuccessMessage"/>
                <h2>Управление аккаунтом</h2>


                <div class="mt-4">
                    <h4>Основное</h4>

                    <div class="mt-3">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p>Отображаемое имя</p>
                                <input type="text" class="fixInput" placeholder="norrthh" v-model="name">
                                <p class="text-sm text-gray-500">Это имя будет отображаться везде на сайте.</p>
                            </div>
                            <div>
                                <p>Ваш Email</p>
                                <input type="email" class="fixInput" placeholder="galem@yandex.ru" v-model="email">
                            </div>
                        </div>
                    </div>

                    <h4 class="mt-10">Соцсети</h4>

                    <div class="mt-3">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p>Вконтакте</p>
                                <input type="text" class="fixInput" placeholder="norrthh" v-model="socialVK">
                            </div>
                            <div>
                                <p>Telegram</p>
                                <input type="text" class="fixInput" placeholder="norrthh" v-model="socialTG">
                            </div>
                        </div>

                        <p class="text-gray-400 text-sm font-medium">Не указывайте полную ссылку, достаточно указать ваш
                            логин.</p>
                    </div>
                </div>

                <button
                    class="ml-auto block mr-auto mt-3 bg-blue-500 p-3 text-white rounded-xl text-sm w-32 hover:bg-blue-700"
                    @click="updateDateAccount">Сохранить
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TheSettingsIndexComponent",

    data() {
        return {
            alertDangerMessage: '',
            alertSuccessMessage: '',

            name: '',
            email: '',
            socialVK: '',
            socialTG: '',

        }
    },

    mounted() {
        let user = JSON.parse(localStorage.getItem('account'))

        this.name = user.name
        this.email = user.email
        this.socialVK = user.social_vk
        this.socialTG = user.social_telegram
    },

    methods: {
        updateDateAccount() {

            let data = {
                email: this.email,
                social_vk: this.socialVK,
                social_telegram: this.socialTG,
                name: this.name
            };


            if (data.email === JSON.parse(localStorage.getItem('account')).email) {
                delete data['email']
            }

            this.alertSuccessMessage = ''
            this.alertDangerMessage = ''

            axios.post('/api/v1/user/edit/settings', data, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('api_token'),
                    }
                })
                .then(res => {
                    localStorage.setItem('account', JSON.stringify(res.data))
                    localStorage.setItem('account_name', res.data.name)

                    this.alertSuccessMessage = 'Вы успешно обновили значения'
                })
                .catch(error => {
                    this.alertDangerMessage = error.response.data.message
                })
        }
    }
}
</script>

<style scoped>

</style>
