<template>
    <router-link class="basis-3/6 w-9/12 newsIndex" :to="`/news/post/${news.indexNews.id}`" v-if="news.indexNews">
        <img :src="news.indexNews.get_content.img_big" alt="" style="height: 361px; width: fit-content;">

        <div class="contentNews relative">
            <div class="titleNews">{{ news.indexNews.nameRU }}</div>
            <p class="subtitleNews">{{ news.indexNews.get_content.textRU }}</p>

            <div class="authorPost">
                <p>{{  news.indexNews.get_content.created_at  }}</p>
            </div>
        </div>
    </router-link>

</template>

<script>
export default {
    name: "TheNewsMainComponent",
    props: {
        img: String,
        title: String,
        subTitle: String,
        date: String,
        news: Array
    }
}
</script>

<style scoped>
.subtitleNews {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
</style>
