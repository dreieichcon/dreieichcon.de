<template>
    <div class="container-fluid error-master">
        <div class="error-image-wrapper">
            <img :src="error.getImage($language)" />
        </div>

        <div class="error-wrapper">
            <div
                class="error-subtitle"
                v-html="error.get('subtitle', $language)"
            ></div>
            <div
                class="error-content"
                v-html="error.get('content', $language)"
            ></div>
        </div>
    </div>
</template>

<script>
module.exports = {
    name: "error",
    data: function () {
        return {};
    },
    created() {},
    props: ["error"],
    mounted() {},
    methods: {},
    components: {},
};
</script>

<style>
@import "css/components/error.css";
</style>