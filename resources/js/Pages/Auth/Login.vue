<template>
    <div class="h-full flex items-center">
        <form-group title="Login" label="Name" for="name">
            <form-input v-model="values.email" name="email" type="email" label="Email" placeholder="Your Email" required />
            <form-input :customError="customError" v-model="values.password" name="password" type="password" label="Password" placeholder="Your Password" @change:modelValue="errors = []" required />
            <a href="#" class="text-gray-300 hover:text-gray-400 font-bold">Forgot your password?</a>
            <a href="register" class="text-gray-300 hover:text-gray-400 pt-2 font-bold pb-2">Create an account</a>
        </form-group>
    </div>
</template>
<script>
import FormGroup from '@/Components/Form.vue'
import FormInput from '@/Components/Input.vue'

export default {
    name: 'Login',
    components: {
        FormGroup,
        FormInput
    },

    data() {
        return {
            values: {
                email: '',
                password: '',
                ...window.old
            },
            errors: window.error
        }
    },

    computed: {
        customError() {
            if (this.errors.length > 0) {
                return this.errors[0];
            }
            return "";
        }
    }
}

</script>
<style scoped>

</style>