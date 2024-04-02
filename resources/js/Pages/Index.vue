<template>
    <div class="mx-12 my-8" v-if="authentificated">
        <h1 class="text-3xl rainbow">Welcome back, {{ userName }}</h1>
        <div class="mt-8">
            <input
                @keypress.prevent.enter="search"
                placeholder="Search"
                v-model="query"
                class="bg-[#333333] px-4 py-2 rounded-3xl w-[40rem]"
            />
            <button @click="search">
                <i class="fa-solid fa-magnifying-glass ml-8 text-2xl"></i>
            </button>
        </div>
        <div class="mt-12 flex flex-wrap items-center justify-start">
            <set-preview v-for="set in sets" :key="set.id" :set="set"></set-preview>
        </div>
    </div>
    <div v-else>
        <h1 class="text-3xl">Hello Stranger</h1>
    </div>
</template>

<script>
import SetPreview from "../Components/SetPreview.vue";

export default {
    name: "Index",
    components: { SetPreview },
    props: {
        userName: {
            type: String,
            default: null,
        },
        sets: {
            type: Array,
            default: () => []
        }
    },
    data() {
        return {
            query: "",
        };
    },

    methods: {
        search() {
            console.log("searching...", this.sets);
        },
    },
    computed: {
        authentificated() {
            return this.userName !== null;
        },
    },
};
</script>
