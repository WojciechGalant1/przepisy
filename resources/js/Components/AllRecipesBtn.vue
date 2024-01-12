<template>
    <button @click="toggleAnimation" class="animated-button">Wszyskie przepisy</button>
</template>

<script>
export default {
    data() {
        return {
            isAnimating: false
        };
    },
    methods: {
        toggleAnimation() {
            this.isAnimating = !this.isAnimating;
        }
    }
};
</script>

<style>
.animated-button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

.animated-button:hover {
    transform: scale(1.1);
}

.animated-button.active {
    animation: pulse 1s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}
</style>
