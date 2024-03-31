<template>
    <div class="h-full flex items-center">
        <form-group :disabled="!isValid" title="Sign Up" label="Name" for="name">
            <form-input v-model="values.first_name" name="first_name" type="text" label="First Name" placeholder="Your Name" required />
            <form-input v-model="values.last_name" name="last_name" type="text" label="Last Name" placeholder="Your Name" required />
            <form-input v-model="values.email" name="email" :customError="emailNotMachError" type="email" label="Email" placeholder="Your Email" required @update:modelValue="resetErrors" />
            <form-input v-model="values.password" name="password" type="password" label="Password" placeholder="Your Password" required />
            <form-input v-model="values.password_confirmation" :customError="customError" name="password_confirmation" type="password" label="Confirm Password" placeholder="Confirm Password" required />
            <a href="login" class="text-gray-300 hover:text-gray-400 font-bold pb-2">Already have an account?</a>
        </form-group>
</div>
</template>

<script>
import FormGroup from '@/Components/Form.vue'
import FormInput from '@/Components/Input.vue'

export default {
    name: "Register",
    components: {
        FormGroup,
        FormInput
    },
    data() {
        return {
            values: {
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                password_confirmation: '',
                ...window.old
            },
            errors: window.error
        }
    },

    methods: {
        resetErrors() {
            this.errors = [];
        }
    },

    computed: {
        isValid() {
            return this.values.password === this.values.password_confirmation;
        },
        customError() {
            if (!this.isValid){
                return 'Passwords do not match';
            }
            if (this.errors.length > 0 && !this.errors[0].includes('email')){
                return this.errors[0];
            }
        },
        emailNotMachError() {
            if (this.errors.length > 0 && this.errors[0].includes('email')){
                return this.errors[0];
            }
        }
    }
}
</script>

<style scoped>
</style>