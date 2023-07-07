<template>
    <div class="container mx-auto mt-4">
            <div class="grid grid-cols-3 gap-4">
                <NewsCard v-for="news in getNews" :id="news.id" :title="news.title" :info="news.text"
                          :date="news.created_at" :img="news.photos"></NewsCard>
        </div>
    </div>
</template>

<script>
import TheNewsCardComponent from "@/components/News/TheNewsCardComponent.vue";

export default {
    name: "TheNewsComponent",

    data() {
        return {
            getNews: [],
            getPhotos: []
        }
    },

    mounted() {
        this.getRNews();
    },

    methods: {
        getRNews() {
            axios.get('/api/v1/news/?count=1&type=2')
                .then(res => {
                    this.getNews = res.data;
                })
        }
    },

    components: {
        NewsCard: TheNewsCardComponent
    },

}
</script>

<style scoped>

</style>
