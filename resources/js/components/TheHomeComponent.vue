<template>
    <div class="content">
        <div class="flex">
            <div class="content__text">
                <h1>Интересные места <br> Республики Татарстан</h1>
                <p>
                    На этом сайте вы можете узнать больше о Татарстане, <br>
                    для этого сайта загружено множество локаций
                </p>
                <a href="#" class="btn">Узнать</a>

                <div class="mt-10 block">
                    <img src="/images/map.png" alt="">
                    <p style="color: #B0B0B0;" class="mt-3">
                        <span style="color: #152C5B" class="font-bold">{{ countNews }}</span>
                        постов
                    </p>
                </div>
            </div>

            <div class="basis-1/2 ml-auto relative">
                <div
                    style="border-radius: 100px 15px 15px 15px; background-image: url('/images/bgHome.jpg');"
                    class="w-[95%] h-[410px] bg-center bg-cover absolute"></div>
                <div class="h-[380px] w-[500px] ml-auto mt-20"
                     style="border: 2px solid #E5E5E5; border-radius: 15px;"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto atmosfer pb-56">
        <h1 class="text-center">Почувствуйте атмосферу</h1>
        <hr class="h-px my-8 bg-[#3252DF] border-0 w-32 mx-auto">

        <Carousel></Carousel>

        <!--        <div id="default-carousel" class="relative w-2/3 mt-10 mx-auto" data-carousel="slider">-->

        <!--            <div class="relative h-[500px] overflow-hidden rounded-lg">-->
        <!--                <TheCarouselImagesComponent v-for="i in 2"></TheCarouselImagesComponent>-->
        <!--            </div>-->

        <!--            <CarouselSliderIndicators></CarouselSliderIndicators>-->
        <!--        </div>-->
    </div>

    <div class="container mx-auto pt-10">
        <h1 class="text-center">Карта Республики Татарстан</h1>
        <hr class="h-px my-8 bg-[#3252DF] border-0 w-32 mx-auto">

        <Map/>
    </div>

<!--    <div v-for="news in arrayNews">-->
<!--        {{ news }}-->
<!--    </div>-->

    <div class="newsHome container mx-auto">
        <h1 class="text-center">Новости</h1>
        <hr class="h-px my-8 bg-[#3252DF] border-0 w-32 mx-auto">

        <div class="flex">
            <TheNewsMainComponent v-for="i in arrayNews" :news="i" img="/images/testNews.png" title="test" subTitle="test2"
                                  date="15.01.01"></TheNewsMainComponent>

            <div class="basis-2/6 w-3/12">
                <TheNewsOtherComponent v-for="(news, key) in arrayNews" :newsInt="key" :news="news"></TheNewsOtherComponent>
            </div>
        </div>
    </div>


    <div class="container mx-auto pb-20">
        <h1 class="text-center">Команда проекта</h1>
        <hr class="h-px my-8 bg-[#3252DF] border-0 w-32 mx-auto">

        <div class="grid grid-cols-3 gap-4">
            <a href="https://t.me/norrthh" class="mx-auto ">
                <img src="/images/command.png" class="mx-auto rounded-3xl" style="width: 359px;" alt="Ayaz">
                <h1 class="text-center text-black text-base font-bold">Аяз Халитов</h1>
                <p class="text-gray-500 text-center font-semibold">Junior разработчик</p>
            </a>
            <a href="https://t.me/said2282" class="mx-auto">
                <img src="/images/command2.png" class="mx-auto rounded-3xl" style="width: 359px;" alt="Said">
                <h1 class="text-center text-black text-base font-bold">Сруров Саид</h1>
                <p class="text-gray-500 text-center font-semibold">Контент мейкер</p>
            </a>
            <a href="#">
                <img alt="Leisan" class="mx-auto rounded-3xl" src="/images/command3.jpg" style="width: 359px;">
                <h1 class="text-center text-black text-base font-bold">Лейсан Мухамедьярова</h1>
                <p class="text-gray-500 text-center font-semibold">Куратор проекта</p>
            </a>
        </div>
    </div>
</template>

<script>

import TheNewsMainComponent from "@/components/Home/TheNewsMainComponent.vue";
import TheNewsOtherComponent from "@/components/Home/TheNewsOtherComponent.vue";
import TheCarouselImagesComponent from "@/components/Home/TheCarouselImagesComponent.vue";
import TheCarouselPaginationComponent from "@/components/Home/TheCarouselPaginationComponent.vue";
import TheMapComponent from "@/components/Home/TheMapComponent.vue";
import TheCarouselComponent from "@/components/Home/TheCarouselComponent.vue";

export default {
    name: "TheHomeComponent",
    components: {
        TheNewsMainComponent, TheNewsOtherComponent, TheCarouselImagesComponent,
        CarouselPagination: TheCarouselPaginationComponent,
        Map: TheMapComponent,
        Carousel: TheCarouselComponent
    },

    data() {
        return {
            countNews: 0,
            arrayNews: [],
        }
    },

    methods: {
        getNews() {
            axios.get('api/v1/news/?count=3&type=1')
                .then(res => {
                    this.arrayNews = res.data
                })
        },

        getInformation() {
            axios.get('api/v1/information/home')
                .then(res => {
                    this.countNews = res.data.countPost;
                })
        }
    },

    mounted() {
        this.getInformation()
        this.getNews()
    }
}
</script>

<style scoped>
.content {
    @apply container mx-auto pt-32
}

.content .content__text h1 {
    font-weight: 700;
    font-size: 42px;
    color: #152C5B;
}

.content .content__text .btn {
    padding: 10px 60px;
    margin-top: 15px;
    font-size: 18px;
    background: #3252DF;
    box-shadow: 0px 8px 15px rgba(50, 82, 223, 0.3);
    border-radius: 4px;
    color: #fff;
    width: 100%;
    display: ruby-base;
}

.content .content__text .btn:hover {
    background: #142984;
}

.content .content__text p {
    color: #B0B0B0;
    font-weight: 400;
    @apply text-xl mt-3 mb-4
}

h1 {
    @apply text-3xl mt-10 text-gray-700 font-semibold
}
</style>
