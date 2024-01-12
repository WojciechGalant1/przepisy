<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';

const availableUnits = ['gram', 'kilogram', 'litr', 'mililitr', 'sztuka', 'szczypta', 'garść', 'łyżka', 'łyżeczka'];
const availableTypes = ['Sniadanie', 'Obiad', 'Kolacja', 'Zupy', 'Dania główne', 'Przystawki', 'Desery', 'Napoje', 'Wegetariańskie'];

const form = useForm({
    title: '',
    description: '',
    type: '',
    image_path: '',
    ingredients: [{name: '', quantity: '', unit: ''}],
});

const removeIngredient = (index) => {
    form.ingredients.splice(index, 1);
};
const addIngredient = () => {
    form.ingredients.push({name: '', quantity: '', unit: ''});
};
const submitRecipe = () => {
    form.post('/add-recipe', {
        onFinish: () => {
            form.reset('title', 'description', 'type', 'image_path');
            if (form.ingredients) {
                form.ingredients.forEach((ingredient) => {
                    form.reset(`ingredients.${ingredient}.name`, `ingredients.${ingredient}.quantity`, `ingredients.${ingredient}.unit`);
                });
            }
        },
    });
};

</script>

<template>
    <Head title="AddReciepe"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dodaj przepis</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


                <form @submit.prevent="submitRecipe"
                      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-lg mx-auto mt-8">

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Tytuł przepisu:</label>
                        <input type="text" id="title" v-model="form.title"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Zdjęcie przepsiu:</label>
                        <input
                            type="text"
                            id="image"
                            v-model="form.image_path"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Wprowadź link do zdjęcia"
                        />
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Opis:</label>
                        <textarea id="description" v-model="form.description"
                                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Rodzaj przepisu:</label>
                        <select v-model="form.type"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                            <option disabled selected value="">Wybierz rodzaj przepisu</option>
                            <option v-for="type in availableTypes" :key="type" :value="type">{{ type }}</option>
                        </select>


                    </div>
                    <!-- Pole wyboru składników -->
                    <div v-for="(ingredient, index) in form.ingredients" :key="index" class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Składnik {{ index + 1 }}:</label>
                        <div class="flex">
                            <input type="text" v-model="ingredient.name"
                                   class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2"
                                   placeholder="składnik">
                            <input type="number" v-model="ingredient.quantity"
                                   class="shadow appearance-none border rounded w-1/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2"
                                   placeholder="ilość">


                            <select v-model="ingredient.unit"
                                    class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                                <option disabled selected value=""> jednostka</option>
                                <option v-for="unit in availableUnits" :key="unit" :value="unit">{{ unit }}</option>
                            </select>


                            <button v-if="index > 0" @click.prevent="removeIngredient(index)"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">
                                Usuń
                            </button>
                        </div>
                    </div>
                    <div>
                        <button @click.prevent="addIngredient"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4">
                            Dodaj składnik
                        </button>
                    </div>
                    <div>
                        <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Dodaj przepis
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<style>
select:required:invalid {
    color: #666;
}

option[value=""][disabled] {
    display: none;
}

option {
    color: #000;
}
</style>
