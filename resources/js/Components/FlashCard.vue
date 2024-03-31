<template>
    <div
        class="w-3/4 m-auto flex items-center justify-center"
        :class="{ flipped: !gotFlipped, back: flipped && gotFlipped }"
    >
        <div
            @click="$emit('flip')"
            class="w-[min(70%,50rem)] mx-20 h-1/2 py-[min(20%,15rem)] flex justify-center cursor-pointer"
            id="flashcard"
        >
            <h1 class="font-bold text-3xl select-none">{{ displayedValue }}</h1>
        </div>
    </div>
</template>
<script>
export default {
    name: "FlashCard",
    emits: ["flip"],
    props: {
        question: {
            type: String,
            required: true,
        },
        answer: {
            type: String,
            required: true,
        },
        flipped: {
            type: Boolean,
            required: true,
        },
    },

    data() {
        return {
            displayedValue: this.question,
            gotFlipped: true,
        };
    },

    watch: {
        flipped(newValue) {
            const newDisplayValue = this.displayedValue == this.question ? this.answer : this.question
            this.gotFlipped = false;
            new Promise((resolve) => setTimeout(resolve, 150)).then(
                () =>
                    (this.displayedValue = newDisplayValue)
            );
            new Promise((resolve) => setTimeout(resolve, 320)).then(
                () => (this.gotFlipped = true)
            );
        },

        answer(newAnswer) {
            this.displayedValue = newAnswer;
            
        },

        question(newQuestion) {
            this.displayedValue = newQuestion;
        },
    },
};
</script>

<style lang="scss">
#flashcard {
    position: relative;
    box-sizing: border-box;
    color: #fff;
    background: #222222;
    background-clip: padding-box;
    border: solid 2px transparent;
    border-radius: 1em;

    &:before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: -1;
        margin: -2px;
        border-radius: inherit;
        background: linear-gradient(315deg, #42d392 25%, #647eff);
    }
}

.flipped {
    animation: rotate 0.3s linear forwards;
}

.flipped h1 {
    animation: mirror 0.15s forwards;
}

.back div::before {
    background: linear-gradient(225deg, #42d392 25%, #647eff) !important;
}

@keyframes rotate {
    0% {
        transform: rotateX(0deg);
    }
    50% {
        transform: rotateX(90deg);
    }
    100% {
        transform: rotateX(180deg);
    }
}

@keyframes mirror {
    0% {
    }
    100% {
        transform: scaleY(-1);
    }
}
</style>
