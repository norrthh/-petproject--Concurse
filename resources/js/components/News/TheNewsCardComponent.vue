<template>
    <router-link :to="`/news/post/${id}`" class="news">
        <img :src="img" alt="" style="height: 300px; width: 100%">
        <div class="content">
            <h1>{{ title }}</h1>
            <p class="info">{{ info }}</p>
            <p class="text-gray-400">{{ date }}</p>
        </div>
    </router-link>
</template>

<script>
export default {
    name: "TheNewsCardComponent",

    props: {
        id: Number,
        title: String,
        info: String,
        date: String,
        img: String,
    }
}
</script>

<style scoped>
.news, img {
    @apply rounded-xl
}

.news .content {
    padding: 20px;
}

.news .content h1 {
    font-size: 22px;
    color: #163152;
    font-weight: 600;
}

.news .content .info {
    color: #283C54;
    font-size: 18px;
    font-weight: 400;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
</style>
