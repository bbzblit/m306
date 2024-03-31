<template>
    <form-group title="Import Collection" class="max-w-full">
        <textarea name="export" class="bg-[#333333] px-4 py-2 rounded-md w-2/3 h-60" required></textarea>
    </form-group>
</template>
<script>
import FormGroup from "@/Components/Form.vue";
import FormInput from "@/Components/Input.vue";

export default {
    name: "Import",
    components: {
        FormGroup,
        FormInput,
    },
    data() {
        return {
            data: [],
        };
    },
};
</script>
<style>
textarea {
    resize: none;
}
</style>
