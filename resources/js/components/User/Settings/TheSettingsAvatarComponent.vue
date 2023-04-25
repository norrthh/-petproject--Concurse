<template>
    <div class="container mx-auto pt-16 pb-32">
        <div class="flex">
            <v-user-header></v-user-header>

            <div class="contentSettings">

                <v-alert-danger class="w-full" :message="alertDangerMessage" v-if="alertDangerStatus"></v-alert-danger>
                <v-alert-success class="w-full" :message="alertSuccessMessage" v-if="alertSuccessMessage"/>

                <div class="flex">
                    <div class="w-2/6">
                        <h2>Аватар</h2>

                        <div class="flex pt-3">
                            <img :src="avatar" class="avatar">

                            <div class="groupButton">
<!--                                <button class="btn_upload">-->
                                    <label for="uploadAvatar" class="button btn_upload">
                                        Загрузить аватар
                                        <input type="file" id="uploadAvatar" class="hidden" multiple @change="uploadAvatar">
                                    </label>
<!--                                </button>-->

                                <button class="button btn_delete" @click="deleteAvatar">Удалить аватар</button>
                            </div>
                        </div>

                        <div class="information">
                            <p>Изображение формата jpg,png, jpeg и gif.</p>
                            <p>Рекомендуемый размер 128х128 пикс. </p>
                        </div>
                    </div>

                    <div class="ml-4 flex-initial">
                        <h4>Последние 10 аватаров, которые вы загружали</h4>

                        <div class="grid grid-cols-5 gap-4" v-if="avatarHistory.length > 0">
                            <img v-for="avatar in avatarHistory" :src="avatar.avatar" class="avatar" >
                        </div>
                        <div v-if="avatarHistory.length ===  0">
                            <p class="font-medium mt-10 text-gray-400">Вы еще не загружали аватаров!</p>
                        </div>
                    </div>
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
            alertSuccessMessage: '',

            avatarHistory: []
        }
    },

    mounted() {
        this.avatar = localStorage.getItem('account_avatar')
        this.historyAvatar()
    },

    methods: {
        uploadAvatar(event) {
            let formData = new FormData();
            formData.append('file', event.target.files[0]);

            axios.post('/api/v1/user/edit/avatar/upload', formData, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('api_token'),
                    'Content-Type': 'multipart/form-data',
                }
            })
                .then(res => {

                    localStorage.setItem('account_avatar', res.data.urlAvatar)
                    this.avatar = res.data.urlAvatar

                    this.historyAvatar()

                    this.alert('Вы успешно обновили аватарку', 1);
                })

                .catch(error => {
                    this.alert(error.response.data.errors.file[1], 2)
                })
        },
        deleteAvatar() {
            axios.post('/api/v1/user/edit/avatar/delete', {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('api_token'),
                }
            })
                .then(res => {
                    localStorage.setItem('account_avatar', res.data.urlAvatar)
                    this.avatar = res.data.urlAvatar
                    this.$emit('avatarUser', res.data.urlAvatar)

                    this.alert('Вы успешно удалили аватарку', 1);
                })
        },

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
        },

        historyAvatar() {
            axios.post('/api/v1/user/edit/avatar/history', {},{
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('api_token'),
                }
            })
                .then(res => {
                    this.avatarHistory = res.data
                })
        }
    }
}
</script>

<style scoped>

.avatar {
    width: 150px;
    height: 150px;
    @apply rounded-xl
}

.groupButton {
    margin-left: 2rem;
    margin-top: 1rem;
}

.button {
    display: block;
    padding: 0.5rem 3rem;
    width: 100%;
    margin-top: 10px;
    color: #fff;
    border-radius: 5px;
    font-weight: 400;
    font-size: 1rem;

    @apply transition-all
}

.groupButton .btn_delete {
    @apply bg-red-600 hover:bg-red-700
}

.groupButton .btn_upload {
    @apply bg-zinc-600 hover:bg-zinc-700 cursor-pointer
}

.information {
    font-size: 12pt;
    margin-top: 2rem;
    @apply text-gray-500
}

.information p {
    font-weight: 500;
}
</style>
