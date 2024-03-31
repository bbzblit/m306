<template>
    <div class="w-full mb-16 relative">
        <div class="h-3 relative">
            <div class="bg-gray-50 h-3 rounded-lg"></div>
            <div
                id="progressbar"
                class="absolute h-3 rounded-lg top-0"
                :style="{ width: percentage }"
            ></div>
        </div>
        <div class="absolute right-0">{{ ptr }} / {{ max }}</div>
    </div>
</template>
<script>
export default {
    name: "LearnProgress",
    props: {
        ptr: {
            type: Number,
            required: true,
        },
        max: {
            type: Number,
            required: true,
        },
    },

    computed: {
        percentage() {
            return Math.floor((this.ptr / this.max) * 100) + "%";
        },
    },
};
</script>
<style>
#progressbar {
    background: linear-gradient(
        297deg,
        rgba(91, 255, 152, 1) 0%,
        rgba(148, 190, 233, 1) 100%
    );
}
</style>
