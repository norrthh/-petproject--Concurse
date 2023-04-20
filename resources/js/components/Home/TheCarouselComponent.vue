<template>
    <div class="relative w-9/12 mx-auto">
        <div class="relative h-[500px] overflow-hidden rounded-lg">
            <div id="carousel-item-1" class="hidden duration-700 ease-in-out">
                <img src="/images/carousel-1.jpg"
                     class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>

            <div id="carousel-item-2" class="hidden duration-700 ease-in-out">
                <img src="/images/bgHome.jpg"
                     class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>

            <div id="carousel-item-3" class="hidden duration-700 ease-in-out">
                <img src="/images/carousel-2.jpg"
                     class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>

            <div id="carousel-item-4" class="hidden duration-700 ease-in-out">
                <img src="/images/carousel-3.jpg"
                     class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>

        <paginate></paginate>
    </div>

</template>

<script>

import {Carousel} from "flowbite";
import TheCarouselPaginationComponent from "@/components/Home/TheCarouselPaginationComponent.vue";

export default {
    name: "TheCarouselComponent",

    components: {
        paginate: TheCarouselPaginationComponent
    },

    mounted: function () {
        this.carousel()
    },

    methods: {
        carousel() {
            const items = [
                {
                    position: 0,
                    el: document.getElementById('carousel-item-1')
                },
                {
                    position: 1,
                    el: document.getElementById('carousel-item-2')
                },
                {
                    position: 2,
                    el: document.getElementById('carousel-item-3')
                },
                {
                    position: 3,
                    el: document.getElementById('carousel-item-4')
                },
            ];

            const options = {
                defaultPosition: 1,
                interval: 3000,
            };

            const carousel = new Carousel(items, options);

            const $prevButton = document.getElementById('data-carousel-prev');
            const $nextButton = document.getElementById('data-carousel-next');

            $prevButton.addEventListener('click', () => {
                carousel.prev();
            });

            $nextButton.addEventListener('click', () => {
                carousel.next();
            });
        }
    }
}
</script>

<style scoped>
    img {
        max-width: 100%;
        max-height: 100%;
        height: auto;
    }
</style>
