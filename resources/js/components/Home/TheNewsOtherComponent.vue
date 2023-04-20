<template>

    <router-link :to="`/news/post/${news.otherNews.id}`" class="news" v-if="news.otherNews" :style="newsInt % 2 === 0 ? 'margin-top: 1rem' : ''">
        <img :src="news.otherNews.get_content.img_big" style="height: 145px; width: fit-content">
        <div class="contentNews">
            <div class="titleNews">{{ news.otherNews.nameRU }}</div>
            <p class="subtitleNews">{{ news.otherNews.get_content.textRU }}</p>

            <div class="authorPost">
                <p>{{ news.otherNews.get_content.created_at }}</p>
            </div>
        </div>
    </router-link>
</template>

<script>
export default {
    name: "TheNewsOtherComponent",
    props: {
        news: Array,
        newsInt: Number
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
