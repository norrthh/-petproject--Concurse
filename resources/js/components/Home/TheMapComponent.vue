<template>
    <Svg></Svg>
    <Information></Information>
</template>

<script>
import TheMapSvgComponent from "@/components/Home/TheMapSvgComponent.vue";
import TheMapInformationComponent from "@/components/Home/TheMapInformationComponent.vue";

export default {
    name: "TheMapComponent",
    components: {
        Svg: TheMapSvgComponent,
        Information: TheMapInformationComponent
    }
}
</script>

<style scoped>

</style>
