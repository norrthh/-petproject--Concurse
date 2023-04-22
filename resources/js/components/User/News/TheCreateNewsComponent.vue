<template>
    <div class="container mx-auto">
        <form class="space-y-8 mt-10">
            <v-alert-danger :message="alertDangerText" v-if="alertDangerStatus"></v-alert-danger>
            <v-alert-success :message="alertSuccessMessage" v-if="alertSuccessMessage"></v-alert-success>

            <div>
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Название
                    поста</label>
                <input type="text" v-model="namePost"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                       placeholder="Галәм">
            </div>

            <div class="sm:col-span-2">
                <label for="message"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Информация</label>
                <textarea id="message" rows="6" v-model="informationPost"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                          placeholder="Галәм..."></textarea>
            </div>

            <label for="message"
                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Загрузить картинки</label>

            <div class="grid grid-cols-3 gap-4">
                <div class="flex items-center justify-center w-full">
                    <label for="dropInput_1" v-if="dropInput_1"
                           class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Нажмите, что б загрузить картинку</span>
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF</p>
                        </div>
                        <input id="dropInput_1" type="file" class="hidden" @change="uploadFile" multiple>
                        <input type="text" class="hidden" :value='input_file_1'>
                    </label>


                    <div class="rounded-xl" v-if="!dropInput_1">
                        <img :src="input_file_1" class="rounded-2xl">
                    </div>
                </div>

                <div class="flex items-center justify-center w-full">
                    <label for="dropInput_2" v-if="dropInput_2"
                           class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Нажмите, что б загрузить картинку</span>
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF</p>
                        </div>
                        <input id="dropInput_2" type="file" class="hidden" @change="uploadFile" multiple>
                        <input type="text" class="hidden" :value='input_file_2'>
                    </label>

                    <div class="rounded-xl" v-if="!dropInput_2">
                        <img :src="input_file_2" class="rounded-2xl">
                    </div>
                </div>

                <div class="flex items-center justify-center w-full">
                    <label for="dropInput_3" v-if="dropInput_3"
                           class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">

                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Нажмите, что б загрузить картинку</span>
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF</p>
                        </div>

                        <input id="dropInput_3" type="file" class="hidden" @change="uploadFile" multiple>

                        <input type="text" class="hidden" :value='input_file_3'>
                    </label>

                    <div class="rounded-xl" v-if="!dropInput_3">
                        <img :src="input_file_3" class="rounded-2xl">
                    </div>
                </div>
            </div>

            <button type="button" @click="createPost"
                    class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300">
                Создать пост
            </button>
        </form>
    </div>
</template>

<script>
export default {
    name: "TheCreateNewsComponent",

    mounted() {

    },


    methods: {
        uploadFile(event) {
            let form = new FormData();
            form.append('file', event.target.files[0])

            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/v1/user/post/uploadImage', form, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        Authorization: 'Bearer ' + localStorage.getItem('api_token')
                    }
                }).then(res => {
                    if (event.target.attributes[0]['textContent'] === 'dropInput_1') {
                        this.input_file_1 = res.data.file;
                        this.dropInput_1 = false;
                    }

                    if (event.target.attributes[0]['textContent'] === 'dropInput_2') {
                        this.input_file_2 = res.data.file;
                        this.dropInput_2 = false;
                    }

                    if (event.target.attributes[0]['textContent'] === 'dropInput_3') {
                        this.input_file_3 = res.data.file;
                        this.dropInput_3 = false;
                    }
                })
            });
        },
        createPost() {
            axios.post('/api/v1/user/post/create', {
                'namePost': this.namePost,
                'informationPost': this.informationPost,
                'images1': this.input_file_1,
                'images2': this.input_file_2,
                'images3': this.input_file_3,
            })
                .then(res => {
                    this.alertSuccessStatus = true
                    this.alertSuccessMessage = res.data.message
                })

                .catch(error => {
                    console.log(error.data)
                })
        }
    },

    data() {
        return {
            input_file_1: '',
            input_file_2: '',
            input_file_3: '',

            dropInput_1: true,
            dropInput_2: true,
            dropInput_3: true,

            namePost: '',
            informationPost: '',

            alertDangerText: '',
            alertDangerStatus: false,


            alertSuccessStatus: false,
            alertSuccessMessage: ''
        }
    }
}
</script>

<style scoped>

</style>
