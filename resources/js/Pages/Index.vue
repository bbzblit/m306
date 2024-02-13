<template>
    <div v-if="authentificated">
        <h1 class="text-3xl">Welcome back, {{ userName }}</h1>

    </div>
    <div v-else>
        <h1 class="text-3xl">Hello Stranger</h1>
    </div>
</template>

<script>
export default{
    name: "Index",
    props: {
        userName: {
            type: String,
            default: null
        }
    },

    computed: {
        authentificated(){
            return this.userName !== null;
        }
    }
}
</script>