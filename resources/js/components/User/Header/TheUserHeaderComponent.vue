<template>
    <div style="width:20%" class="navbarSettings">
        <p class="text-gray-500 font-semibold" style="font-size: 11pt;">Аккаунт</p>

        <router-link to="/user/settings">Настройки</router-link>
        <router-link to="/user/settings/avatar">Аватар</router-link>
        <router-link to="/user/settings/password">Пароль и безопасность</router-link>
    </div>
</template>

<script>
export default {
    name: "TheUserHeaderComponent"
}
</script>

<style scoped>
.navbarSettings a {
    width: 100%;
    color: #152C5B;
    padding: .2rem .5rem;
    border-radius: .25rem;
    @apply text-base block mt-3
}

.router-link-active {
    color: #fff !important;
    @apply bg-blue-500 rounded-sm
}

</style>
