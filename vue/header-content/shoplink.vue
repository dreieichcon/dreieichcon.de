<template>
    <a @click="navigate(shoplink)" class="main-link">
        <div class="main-link-flex">
            <img class="shoplink-img" src="/resources/img/ticket-button.png" />
        </div>
    </a>
</template>

<script>
module.exports = {
    name: "shoplink",
    data: function () {
        return {};
    },
    created() {},
    props: [],
    mounted() {},
    methods: {
        navigate(href) {
            this.emitter.emit("navigate", { id: href });
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/header-bar.css";
</style>