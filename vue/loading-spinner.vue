<template>
    <div v-show="page" class="spinner-wrapper" :class="overall">
        <div class="spinner-tab">
            <img
                class="spinner"
                src="/resources/icons/svgs/solid/spinner.svg"
            />
            <div>Loading ...</div>
        </div>
    </div>
</template>

<script>
module.exports = {
    name: "",
    data: function () {
        return {
            page: true,
            nav: true,
        };
    },
    created() {
        this.emitter.on("loading", (e) => {
            if (e.page != undefined) this.page = e.page;
            if (e.nav != undefined) this.nav = e.nav;
        });
    },
    computed: {
        overall() {
            return this.nav ? "spinner-overall" : "";
        },
    },
    props: [],
    mounted() {},
    methods: {},
    components: {},
};
</script>

<style>
@import "css/components/loading-spinner.css";
</style>