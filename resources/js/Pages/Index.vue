<template>
    <div class="mx-12 my-8" v-if="authentificated">
        <div class="flex items-end justify-between">
            <h1 class="text-3xl rainbow m-0">Welcome back, {{ userName }}</h1>
            <i
                class="fa-solid fa-plus my-auto mx-4 text-xl cursor-pointer"
                @click="redirect"
            ></i>
        </div>
        <div class="h-[1px] bg-[#333333] w-full mt-4"></div>
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
            <set-preview
                v-for="set in sets"
                :key="set.id"
                :set="set"
            ></set-preview>
            <div
                @click="redirect"
                class="w-[30rem] min-h-28 mr-4 border border-dashed border-gray-500 p-4 rounded-lg m-4 hover:scale-110 cursor-pointer flex align-center justify-center"
            >
                <i
                    class="fa-solid fa-plus text-xl text-gray-500 m-auto"
                    @click="redirect"
                ></i>
            </div>
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
            default: () => [],
        },
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
        redirect() {
            window.location = "/import";
        },
    },
    computed: {
        authentificated() {
            return this.userName !== null;
        },
    },
};
</script>
