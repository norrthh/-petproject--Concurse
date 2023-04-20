<template>
    <div class="flex justify-center items-center pt-4">
        <button type="button"
                class="flex justify-center items-center mr-4 h-full cursor-pointer group focus:outline-none"
                id="data-carousel-prev">
            <span
                class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                              d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                                              clip-rule="evenodd"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
                class="flex justify-center items-center h-full cursor-pointer group focus:outline-none"
                id="data-carousel-next">
            <span
                class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                              d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"></path></svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</template>

<script>
export default {
name: "TheCarouselPaginationComponent"
}
</script>

<style scoped>

</style>
