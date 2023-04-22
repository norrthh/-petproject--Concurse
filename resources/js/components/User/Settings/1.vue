<template>
    <div class="container mx-auto pt-16 pb-32">
        <div class="flex">
            <v-user-header />
            <div class="contentSettings">

                <v-alert-danger class="w-full" :message="alertDangerMessage" v-if="alertDangerStatus"></v-alert-danger>
                <v-alert-success class="w-full" :message="alertSuccessMessage" v-if="alertSuccessMessage"/>
                <h2>Аватар</h2>


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
