<template>
    <div class="h-full flex items-center">
        <form-group :disabled="!isValid" title="Login" label="Name" for="name">
            <form-input name="email" type="email" label="Email" placeholder="Your Email" required />
            <form-input v-model="password" name="password" type="password" label="Password" placeholder="Your Password" required />
            <a href="#" class="text-blue-600">Forgot your password?</a>
            <a href="register" class="text-blue-600">Create an account</a>
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
}

</script>
<style scoped>

</style>