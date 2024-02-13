<template>
    <div class="h-full flex items-center">
        <form-group :disabled="!isValid" title="Sign Up" label="Name" for="name">
            <form-input name="first_name" max="255" type="text" label="First Name" placeholder="Your Name" required />
            <form-input name="last_name" max="255" type="text" label="Last Name" placeholder="Your Name" required />
            <form-input name="email" type="email" label="Email" placeholder="Your Email" required />
            <form-input v-model="password" name="password" type="password" label="Password" placeholder="Your Password" required />
            <form-input v-model="passwordConfirm" :customError="passwordMatchError" name="password_confirmation" type="password" label="Confirm Password" placeholder="Confirm Password" required />
            <a href="login" class="text-blue-600">Already have an account?</a>
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
            password: '',
            passwordConfirm: ''
        }
    },

    computed: {
        isValid() {
            return this.password === this.passwordConfirm;
        },
        passwordMatchError() {
            return this.isValid ? '' : 'Passwords do not match';
        }
    }
}
</script>

<style scoped>
</style>