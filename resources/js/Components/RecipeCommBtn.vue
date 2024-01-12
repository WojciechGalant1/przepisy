<script setup>
import { ref } from 'vue';

const recipe = ref(null);

recipe.value = props.recipe;

</script>

<template>
    <div>
        <nav class="rc">
            <a :href="`/recipes/${recipe.id}`"><span class="text-blue-500 hover:text-blue-700">Przepis</span></a>
            <a :href="`/recipes/${recipe.id}/comments`"><span class="text-blue-500 hover:text-blue-700">Przejdź do komentarzy</span></a>
        </nav>
    </div>
</template>

<style scoped>
nav.rc {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f0f0f0;
    padding: 10px;
    max-width: 400px; /* Maksymalna szerokość nawigacji */
    margin: 0 auto; /* Centralizacja nawigacji */
}

/* Styl przycisku */
nav.rc a {
    display: inline-block;
    padding: 8px 12px;
    text-decoration: none;
    color: #333;
    background-color: #ddd;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

/* Styl przycisku aktywnego */
nav a.active {
    background-color: blue; /* Kolor podświetlenia dla przycisku aktywnego */
    color: white; /* Kolor tekstu dla przycisku aktywnego */
}
</style>
