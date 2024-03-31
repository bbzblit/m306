<template>
    <div class="m-12 t-18 flex flex-col items-start">
        <learn-progress :ptr="completedCards" :max="totalCards"></learn-progress>
        <flash-card
            :question="currentFlashCard.key"
            :answer="currentFlashCard.value"
            :flipped="showAnswer"
            @flip="showAnswer = !showAnswer"
        ></flash-card>
        <div class="mt-8 w-40 mx-auto flex justify-between items-center">
            <i @click="repeat" class="fa-solid fa-x text-xl cursor-pointer text-red-500 hover:text-red-600"></i>
            <i
                @click="this.showAnswer = !this.showAnswer"
                class="fa-solid fa-repeat cursor-pointer hover:text-gray-300"
            ></i>
            <i
                @click="completed"
                class="fa-solid fa-check text-xl cursor-pointer text-green-500 hover:text-green-600"
            ></i>
        </div>
    </div>
</template>

<script>
import FlashCard from "../../Components/FlashCard.vue";
import LearnProgress from "../../Components/Progress.vue";

export default {
    name: "Train",
    components: { FlashCard, LearnProgress },
    props: {
        set: {
            type: Object,
            required: false,
            default: () => {},
        },
        initialFlashCards: {
            type: Array,
            required: false,
            default: () => [],
        },
    },
    data() {
        return {
            flashCards: this.initialFlashCards,
            currentFlashCard: this.initialFlashCards[0],
            currentIndex: 0,
            completedCards: 0,
            totalCards: this.initialFlashCards.length,
            showAnswer: false,
        };
    },

    methods: {
        click(event) {
            if (event.code === "Space") {
                this.showAnswer = !this.showAnswer;
            }
        },

        repeat() {
            this.nextCard();
        },

        completed() {
            this.flashCards.pop(this.currentIndex);
            this.completedCards++;
            this.nextCard();
        },

        nextCard() {
            this.currentIndex = this.getRandomInt(
                this.totalCards - this.completedCards
            );
            this.currentFlashCard = this.flashCards[this.currentIndex];
        },

        getRandomInt(max) {
            return Math.floor(Math.random() * max);
        },
    },

    mounted() {
        document.addEventListener("keydown", this.click);
    },

    beforeUnmount() {
        document.removeEventListener("keydown", this.click);
    },
};
</script>

<style></style>
