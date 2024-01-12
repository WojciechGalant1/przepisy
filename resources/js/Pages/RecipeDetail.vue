<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import {Head} from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";

export default {
    components: {NavLink, Head, AppLayout},
    props: {
        recipe: {
            type: Object,
            required: true
        },
        averageRating: {
            type: Number,
            default: 0
        },
        currentPath: {
            type: String,
            required: true
        }
    },

    data() {
        return {
            rating: 1,
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };
    },

    mounted() {
        console.log(this.averageRating);
    },
    computed: {
        isRecipeActive() {
            return this.currentPath.startsWith(`/recipes/${this.recipe.id}`);
        },
        isCommentActive() {
            return this.currentPath.startsWith(`/recipes/${this.recipe.id}/comments`);
        },
    },
    methods: {
        async rateRecipe() {
            try {
                const response = await this.$inertia.post(`/recipes/${this.recipe.id}/rate`, {
                    recipe_id: this.recipe.id,
                    rating: this.rating,
                });
                console.log(response.data.success);
                // Przekierowanie na aktualną stronę przepisu
                this.$inertia.visit(`/recipes/${this.recipe.id}`);
            } catch (error) {
                console.error(error);
            }
        },
    },
};


</script>

<template>
    <Head title="Recipe Detail"/>
    <AppLayout>
        <template #header>

            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <NavLink
                    :href="`/recipes/${recipe.id}`" :active="isRecipeActive"
                >
                    Przepis
                </NavLink>
                <NavLink
                    :href="`/recipes/${recipe.id}/comments`"
                    :active="isCommentActive"
                >
                    Komentarze
                </NavLink>
            </div>
        </template>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Tytuł: {{ recipe.title }}</h1>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Przygotowanie:</h2>

            <p class="text-gray-700">{{ recipe.description }}</p>

            <h3 class="font-semibold text-xl text-gray-800 leading-tight">Składniki:</h3>
            <ul>
                <li v-for="ingredient in recipe.ingredients" :key="ingredient.id" class="text-gray-700">
                    {{ ingredient.name }} - {{ ingredient.pivot.quantity }} {{ ingredient.pivot.unit }}
                </li>
            </ul>

            <h2>Średnia ocena: {{ averageRating }}</h2>

            <h1 class="font-semibold text-xl text-gray-800 leading-tight mt-8">Oceń przepis</h1>
            <form @submit.prevent="rateRecipe" class="flex items-center mt-4">
        <select v-model="rating"
                class="block appearance-none w-20 bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit"
                class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Oceń
        </button>
    </form>


            <h1 class="font-semibold text-xl text-gray-800 leading-tight mt-8">Dodaj komentarz</h1>
            <form :action="`/recipes/${recipe.id}/comments`" method="POST"
                  class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-lg mx-auto mt-8">
                <input type="hidden" name="_token" :value="csrfToken">
                <input type="hidden" name="recipe_id" :value="recipe.id">
                <textarea name="content" rows="4" cols="50"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"></textarea>
                <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Dodaj komentarz
                </button>
            </form>

        </div>
    </AppLayout>
</template>





