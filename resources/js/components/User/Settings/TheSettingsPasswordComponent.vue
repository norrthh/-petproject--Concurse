<template>
    <div class="container mx-auto pt-16 pb-32">
        <div class="flex">
            <v-user-header/>
            <div class="contentSettings">
                <v-alert-danger class="w-full" :message="alertDangerMessage" v-if="alertDangerStatus"></v-alert-danger>
                <v-alert-success class="w-full" :message="alertSuccessMessage" v-if="alertSuccessMessage"/>

                <h2>Пароль и безопасность</h2>

                <h4 class="mt-4 mb-4">Смена пароля</h4>

                <div>
                    <p>Новый пароль</p>
                    <input type="password" class="fixInput" placeholder="test">
                    <button
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
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4">
                                    Silver
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
            avatar: '',
            alertDangerStatus: false,
            alertDangerMessage: '',

            alertSuccessStatus: false,
            alertSuccessMessage: ''
        }
    },

    mounted() {
        this.avatar = localStorage.getItem('account_avatar')
    },

    methods: {
        alert(message, status) {
            if (status === 1) {

                this.alertDangerStatus = false;
                this.alertSuccessStatus = true;
                this.alertSuccessMessage = message;

            } else {
                this.alertSuccessStatus = false;
                this.alertDangerStatus = true;
                this.alertDangerMessage = message;
            }
        }
    }
}
</script>

<style scoped>
</style>
