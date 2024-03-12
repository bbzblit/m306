<template>
    <div v-if="authentificated">
        <h1 class="text-3xl">Welcome back, {{ userName }}</h1>
    </div>
    <div v-else>
        <h1 class="text-3xl">Hello Stranger</h1>
    </div>

    <SetPreview title="Test"></SetPreview>
</template>

<script>
import SetPreview from '../Components/SetPreview.vue';

export default {
    name: "Index",
    components: [SetPreview],
    props: {
        userName: {
            type: String,
            default: null,
        },
    },

    computed: {
        authentificated() {
            return this.userName !== null;
        },
    },
};
</script>
