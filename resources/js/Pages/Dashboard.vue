<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {ref} from 'vue';
import {usePage} from "@inertiajs/vue3";

const {props} = usePage();
const recipes = ref(props.recipes || []);
</script>
<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">TWOJE PRZEPISY</div>
                    <ul>
                        <li v-for="(recipe, index) in recipes" :key="index">
                            <a :href="`/recipes/${recipe.id}`"
                               class="p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl
                                shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                            >
                                {{ recipe.title }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900"></div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
