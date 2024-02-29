<template>
    <form method="post" enctype="multipart/form-data" class="drop-shadow-lg mx-auto px-8 py-4 rounded-md max-w-[max(20rem,40%)] flex flex-col items-center">
        <div v-if="title" class="px-4 py-2">
            <h1 class="rainbow">{{ title }}</h1>
        </div>
        <slot class="w-full"></slot>
        <input type="hidden" name="_token" :value="csrf">        
        <div class="w-80 mt-4">
            <button :disabled="disabled" type="submit" class="w-full py-2 bg-[#42d392] rounded-md text-black">
                Submit
            </button>
        </div>
    </form>
</template>
<script>
export default {
    name: "FormGroup",
    props: {
        title: {
            type: String,
        },
        disabled: {
            type: Boolean,
            default: false
        }
    },

    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },

    methods: {
        submit() {
            $emit('submit');
        }
    }
}
</script>
<style scoped></style>