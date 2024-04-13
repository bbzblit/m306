<template>
    <div class="flex items-center justify-center flex-col h-full">
        <form-group title="Password Reset" label="Name" for="name">
            <form-input  name="email" type="email" label="Email" placeholder="Your Email" required />
            <div v-if="reseted">
                <p class="text-green-500">Password reset link has been sent to your email</p>

            </div>
            <a href="login" class="text-gray-300 hover:text-gray-400 font-bold">Log In</a>
            <a href="register" class="text-gray-300 hover:text-gray-400 pt-2 font-bold pb-2">Create an account</a>
        </form-group>
    </div>
</template>
<script>
import FormGroup from '@/Components/Form.vue';
import FormInput from '@/Components/Input.vue';

export default {
    name: "PasswordReset",
    components: {FormGroup, FormInput},
    props: {
        reseted: {
            type: Boolean,
            default: false,
        },
    }
};
</script>
<style></style>