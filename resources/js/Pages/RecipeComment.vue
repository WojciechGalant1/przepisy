<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import {Head} from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";


export default {
    components: { NavLink, Head, AppLayout },
    props: {
        comments: {
            type: Array,
            required: true,
        },
        recipe: {
            type: Object,
            required: true
        },
        currentPath: {
            type: String,
            required: true
        }
    },
    computed: {
        isRecipeActive() {
            return this.currentPath === `/recipes/${this.recipe.id}`;
        },
        isCommentActive() {
            return this.currentPath === `/recipes/${this.recipe.id}/comments`;
        },
    },
};
</script>

<template>
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





        <Head title="Recipe Comment"/>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-dots-darker bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        <div>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight mt-8">Komentarze do przepisu</h1>
            <ul>
                <li v-for="comment in comments" :key="comment.id" class="text-gray-700 border-b py-4">
                    <p>{{ comment.content }}</p>
                    <p class="text-gray-500">{{ comment.user.name }}</p>
                </li>
            </ul>
        </div>
    </div>
    </AppLayout>
</template>




