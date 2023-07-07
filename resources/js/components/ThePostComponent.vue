<template>
    <div class="container mx-auto" v-for="news in newsInfo">
        <h1 class="text-center text-4xl text-blue-800 font-bold mt-8" id="title_post">
            {{ news.title }}
        </h1>

<!---->

        <!---->
        <div class="pt-5 text-gray-500">
            <div class="flex max-lg:block">
                <div class="w-3/5 max-lg:w-full">
                    <p class="text-blue-800 font-bold text-2xl">Информация</p>
                    <p>{{ news.text }}</p>
                </div>
                <div class="flex-1 max-lg:mt-8">
                    <p class="text-blue-800 font-bold text-2xl">Оставить комментарии</p>

                    <v-alert-danger :message="alertErrorMessage" v-if="alertErrorStatus"></v-alert-danger>
                    <v-alert-success :message="alertSuccessMessage" v-if="alertSuccessStatus" />

                    <form>
                        <label for="chat" class="sr-only">Your message</label>
                        <div class="flex items-center py-2 rounded-lg bg-gray-50 dark:bg-gray-700">

                            <textarea id="chat"
                                      v-model="comments"
                                      class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                      required></textarea>

                            <button type="button" @click="sendComments"
                                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                                </svg>
                                <span class="sr-only">Send message</span>
                            </button>
                        </div>
                    </form>

                    <div class="mt-5" v-for="comments in commentsInfo">
                        <div class="flex">
                            <img :src="comments.get_users.avatar" class="w-7 rounded-full" alt="avatar">
                            <p class="font-semibold text-blue-700 ml-3">{{ comments.get_users.name }}</p>
                            <p class="font-semibold text-gray-400 ml-2">{{ formatDate(comments.created_at) }}</p>
                        </div>
                        <p class="mt-2 font-semibold">{{ comments.message }}</p>

                        <hr class="h-2">
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-4">
            <div>
                <img class="max-w-full rounded-lg" style="height:500px" :src="getPhotos[Math.floor(Math.random() * getPhotos.length)]" alt="">
            </div>
            <div class="grid grid-cols-5 gap-4">
                <div v-for="i in getPhotos">
                    <img class="h-auto max-w-full rounded-lg" :src="i" alt="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ThePostComponent",

    data() {
        return {
            newsInfo: [],
            getPhotos: [],
            commentsInfo: [],

            alertErrorStatus: false,
            alertErrorMessage: '',

            alertSuccessStatus: false,
            alertSuccessMessage: '',

            comments: ''
        }
    },

    mounted() {
        axios.get('/api/v1/news/' + this.$route.params.page)
            .then(res => {
                this.newsInfo = res.data;
                this.getPhotos = JSON.parse(res.data[0].photos);
                console.log(res.data)
            })

        this.getComments();

        // getPhotos[Math.floor(Math.random() * getPhotos.length)]
    },

    methods: {
        formatDate(date) {
            const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            return new Date(date).toLocaleDateString('ru-RU', options).split('.').reverse().join('-');
        },
        getComments() {
            axios.get('/api/v1/comments/' + this.$route.params.page)
                .then(res => {
                    this.commentsInfo = res.data
                })
        },

        sendComments() {
            axios.post('/api/v1/comments/sendMessage', {
                comments: this.comments,
                post_id: this.$route.params.page
            }, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('api_token')
                }
            })
                .then(res => {
                    this.alertSuccessMessage  = res.data.message
                    this.alertSuccessStatus = true

                    this.getComments()
                })
                .catch(error => {
                    this.alertStatus = true
                    this.alertMessage = error.response.data.message
                })
        }
    }
}
</script>

<style scoped>

</style>
