<template>
    <div @click="reroute" class="w-[30rem] max-h-32 min-h-32 relative mr-4 border border-gray-500 p-4 rounded-lg m-4 hover:scale-110 cursor-pointer">
        <h1 class="font-bold text-xl">{{ set.title }}</h1>
        <h2>{{ set.description }}</h2>
        <span class="text-sm italic mt-auto absolute bottom-3 right-3">Last Update {{ updatedAt }}</span>
    </div>
</template>
<script>
export default{
    name: "SetPreview",
    props: {
        set: {
            type: Object,
            required: true,
            default: () => {},
        },
    },

    methods: {
        reroute() {
            window.location = `/train/${this.set.id}`;
        },
    },
    computed: {
        updatedAt() {
            return new Date(this.set.updated_at).toLocaleDateString();
        },
    }
}
</script>
<style>
</style>