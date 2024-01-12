<template>
    <div className="search-wrapper">
        <input
            type="text"
            v-model="search"
            @input="filterRecipes"
            @focus="expandInput"
            @blur="shrinkInput"
            placeholder="Znajdź przepis..."
            class="search-bar"
        >

    </div>
</template>

<script>
export default {
    data() {
        return {
            search: '',
        };
    },
    methods: {
        filterRecipes() {
            this.$emit('filter-recipes', this.search.toLowerCase());
        },
        expandInput() {
            document.querySelector('.search-bar').classList.add('expanded');
        },
        shrinkInput() {
            if (!this.search) {
                document.querySelector('.search-bar').classList.remove('expanded');
            }
        },
    },
};
</script>

<style scoped>
.search-bar {
    display: block;
    width: 350px;
    margin: 20px auto;
    padding: 10px 45px;
    background-size: 15px 15px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px,
    rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    transition: all 0.3s ease-in-out;
}


.search-bar.expanded {
    transform: scale(1.05);
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}
</style>
