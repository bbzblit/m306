<template>
    <div class="flex items-center justify-center flex-col h-full">
        <form-group title="Password Reset" label="Name" for="name">
            <form-input
                v-model="values.password"
                name="password"
                type="password"
                label="Password"
                placeholder="Your Password"
                required
            />
            <form-input
                v-model="values.password_confirmation"
                :customError="customError"
                name="password_confirmation"
                type="password"
                label="Confirm Password"
                placeholder="Confirm Password"
                required
            />
            <a href="login" class="text-gray-300 hover:text-gray-400 font-bold"
                >Log In</a
            >
            <a
                href="register"
                class="text-gray-300 hover:text-gray-400 pt-2 font-bold pb-2"
                >Create an account</a
            >
        </form-group>
    </div>
</template>
<script>
import FormGroup from "@/Components/Form.vue";
import FormInput from "@/Components/Input.vue";

export default {
    name: "PasswordReset",
    components: { FormGroup, FormInput },
    data() {
        return {
            values: {
                password: "",
                password_confirmation: "",
            },
            errors: window.error,
        };
    },
    computed: {
        isValid() {
            return this.values.password === this.values.password_confirmation;
        },
        customError() {
            if (!this.isValid) {
                return "Passwords do not match";
            }
            if (this.errors.length > 0 && !this.errors[0].includes("email")) {
                return this.errors[0];
            }
        },
    },
};
</script>
<style></style>
