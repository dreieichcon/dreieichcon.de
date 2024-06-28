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
    props: ["shoplink"],
    mounted() {},
    methods: {
        navigate(link) {
            this.emitter.emit("navigate", { href: link });
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/header-bar.css";
</style>