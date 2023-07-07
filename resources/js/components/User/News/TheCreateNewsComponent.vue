<template>
    <div class="container mx-auto">
        <form class="space-y-8 mt-10">
            <v-alert-danger :message="alertDangerText" v-if="alertDangerStatus"></v-alert-danger>
            <v-alert-success :message="alertSuccessMessage" v-if="alertSuccessMessage"></v-alert-success>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Название
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
                <div class="flex items-center justify-center w-full" v-for="i in inputInt">
                    <label :for="'dropInput_' + i"
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
                        <input :id="'dropInput_' + i" name="file[]" type="file" class="hidden" @change="uploadFile">
                    </label>

                    <div class="rounded-xl" :id="'blockInputFile' + i">
                        <img :id="'inputFIle_' + i" class="rounded-2xl h-64" alt="">
                    </div>
                </div>

                <div class="flex items-center justify-center w-full" @click="createInput">
                    <div class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-3 text-gray-400"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Добавить инпут для картинок</span></p>
                        </div>
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
import {Modal} from "flowbite";

export default {
    name: "TheCreateNewsComponent",

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
                    let number = parseInt(event.target.attributes[0].value.match(/\d+/)[0]); // получаем ID блока, с которого загружаем файл
                    let label = document.querySelector('label[for="dropInput_'+ number +'"]');
                    label.style.display = 'none';

                    let imgFile = document.getElementById('inputFIle_' + number);
                    imgFile.setAttribute('src', res.data.file);

                    console.log(number);

                    this.input_file[number] = res.data.file;
                })
            });
        },
        createPost() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/v1/user/post/create', {
                    'namePost': this.namePost,
                    'informationPost': this.informationPost,
                    'img': this.input_file,
                }, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('api_token')
                    }
                })
                    .then(res => {
                        this.alertSuccessStatus = true
                        this.alertSuccessMessage = res.data.message
                    })
                    .catch(error => {
                        console.log(error.response.data.errors)
                        this.alertDangerText = error.response.data.message;
                        this.alertDangerStatus = true;
                    })
            });
        },
        createInput() {
            this.inputInt++
        }
    },

    data() {
        return {
            input_file: {},
            inputInt: 1,

            namePost: '',
            informationPost: '',

            alertDangerText: '',
            alertDangerStatus: false,

            alertSuccessStatus: false,
            alertSuccessMessage: '',
        }
    },

}
</script>

<style scoped>

</style>
