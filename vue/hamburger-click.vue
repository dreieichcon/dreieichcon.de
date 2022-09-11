<template>
    <div
        v-if="$hamburger.value"
        class="clickinterrupter"
        @click="close()"
    ></div>
</template>

<script>
module.exports = {
    name: "",
    data: function () {
        return {};
    },
    created() {},
    props: [],
    mounted() {},
    methods: {
        close() {
            this.$hamburger.value = false;
        },
    },
    components: {},
};
</script>

<style>
.clickinterrupter {
    position: absolute;
    left: 0;
    top: 0;
    height: 100vh;
    width: 100vw;
    background: transparent;
}
</style>