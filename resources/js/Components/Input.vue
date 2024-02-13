<template>
    <div class="bg-transparent border-none relative flex flex-col w-80">
        <label class="pb-2">{{ label }}</label>
        <input v-bind="$attrs" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :maxlength="max" :minlength="min" :required="required" :type="type" :placeholder="placeholder" class="bg-[#1d2432] px-4 py-2 rounded-md" @invalid="invalid">
        <div class="min-h-6">
            <label class="text-red-600 font-bold text-sm mt-2">{{ error ? error : customError }}</label>
        </div>
    </div>
</template>

<script>
export default{
    name: 'FormInput',
    emits: ['update:modelValue'],
    props: {
        label: {
            type: String,
        },
        type: {
            type: String,
            default: 'text'
        },
        placeholder: {
            type: String,
            default: ''
        },
        required: {
            type: Boolean,
            default: false
        },
        max: {
            type: Number,
        },
        min: {
            type: Number,
        },
        modelValue: {
            default: ''
        },
        customError: {
            type: String,
            default: ''
        }
    },

    data() {
        return {
            error: ""
        }
    },

    methods: {
        invalid(event) {
            event.preventDefault();
            let error = event.originalTarget.validity;

            if (error.valueMissing) {
                this.error = "This field is required";
            } else if (error.typeMismatch) {
                this.error = "Please enter a valid email address";
            } else if (error.tooShort) {
                this.error = `Value must be at least ${this.min} characters long`;
            } else if (error.tooLong) {
                this.error = `Value must be shorter than ${this.max} characters`;
            } else {
                this.error = "Error";
            }
        }
    }
}
</script>
<style>
</style>