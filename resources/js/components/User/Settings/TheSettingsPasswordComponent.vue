<template>
    <div class="container mx-auto pt-16 pb-32">
        <div class="flex">
            <v-user-header/>
            <div class="contentSettings">
                <v-alert-danger class="w-full" :message="alertDangerMessage" v-if="alertDangerMessage"></v-alert-danger>
                <v-alert-success class="w-full" :message="alertSuccessMessage" v-if="alertSuccessMessage"/>

                <h2>Пароль и безопасность</h2>

                <h4 class="mt-4 mb-4">Смена пароля</h4>

                <div>
                    <p>Новый пароль</p>
                    <input type="password" class="fixInput" placeholder="••••••••" v-model="password">
                    <button
                        @click="changePassword"
                        class="w-full text-white bg-blue-500 hover:bg-blue-700 text-sm p-4 mt-2 rounded-xl transition">
                        Сохранить
                    </button>
                </div>

                <h4 class="mt-4 mb-4">Логи изменения паролей</h4>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    IP
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="hist in history">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{  hist.ip }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ formatDate(hist.created_at) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

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
            password: '',
            history: []
        }
    },

    mounted() {
        this.avatar = localStorage.getItem('account_avatar')
        this.historyChangePassword()
    },

    methods: {
        changePassword() {
            this.alertDangerMessage = ''
            this.alertSuccessMessage = ''
            axios.post('/api/v1/user/edit/password/changePassword',
                {
                    password: this.password
                },
                {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('api_token')
                    }
                }
            )
                .then(res => {
                    this.alertSuccessMessage = res.data.message

                    this.historyChangePassword()
                })
                .catch(error => {
                    this.alertDangerMessage = error.response.data.message
                })
        },

        historyChangePassword() {
            axios.post('/api/v1/user/edit/password/historyChangePassword', {}, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('api_token')
                }
            })
                .then(res => {
                    this.history = res.data
                })
        },

        formatDate(date) {
            const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            return new Date(date).toLocaleDateString('ru-RU', options).split('.').reverse().join('-');
        },
    }
}
</script>

<style scoped>
</style>
