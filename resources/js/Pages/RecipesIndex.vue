<script>
import SearchBar from '@/Components/SearchBar.vue';
import AppLayout from "@/Layouts/AppLayout.vue";
import {Head} from "@inertiajs/vue3";

export default {
    props: {
        recipes: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            filteredRecipes: this.recipes,
        };
    },
    methods: {
        filterRecipes(search) {
            this.filteredRecipes = this.recipes.filter((recipe) => {
                return recipe.title.toLowerCase().includes(search);
            });
        },
    },
    components: {Head, AppLayout, SearchBar},
};
</script>

<template>
    <Head title="Recipe List"/>
    <AppLayout>
        <div
            class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker  bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
        >
            <div class="max-w-lg w-full">

                <SearchBar @filter-recipes="filterRecipes"/>
                <div v-for="recipe in filteredRecipes" :key="recipe.id" class="mb-4">
                    <a
                        :href="`/recipes/${recipe.id}`"
                        class="p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                    >
                        <div>
                            <div class="h-24 w-24 overflow-hidden">
                                <img :src="recipe.image_path" alt="Recipe Image"
                                     class="h-full w-full object-cover rounded-lg"/>
                            </div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ recipe.title }}</h2>
                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">{{
                                    recipe.type
                                }}</p>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<style scoped>

</style>
