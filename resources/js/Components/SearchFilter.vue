<script setup>
import { ref, defineProps, defineEmits } from 'vue';


const selectedTypes = ref([]);
const availableTypes = [
    'Sniadanie',
    'Obiad',
    'Kolacja',
    'Zupy',
    'Dania główne',
    'Przystawki',
    'Desery',
    'Napoje',
    'Wegetariańskie'
];

const { recipes } = defineProps(['recipes']);
const emit = defineEmits(['filter-by-type']);

function filterByType() {
    const selectedRecipes = recipes.filter(recipe =>
        selectedTypes.value.includes(recipe.type)
    );
    emit('filter-by-type', selectedRecipes);
}
</script>

<template>
    <div>
        <h3 class="text-lg font-semibold mb-2">Wybierz typ przepisu:</h3>
        <div v-for="type in availableTypes" :key="type">
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="type"
                    v-model="selectedTypes"
                    @change="filterByType"
                    class="form-checkbox h-5 w-5 text-red-600 rounded border-gray-300"
                />
                <span class="ml-2 text-gray-700">{{ type }}</span>
            </label>
        </div>
    </div>
</template>

<style scoped>

</style>
