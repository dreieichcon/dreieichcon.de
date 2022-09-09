<template>
    <div v-show="stillLoading || page" class="spinner-wrapper" :class="overall">
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
            socials: true,
            globals: true,
            stillLoading: true,
            overall: "spinner-overall",
        };
    },
    created() {
        this.emitter.on("loading", (e) => {
            if (e.page != undefined) this.page = e.page;
            if (e.nav != undefined) this.nav = e.nav;
            if (e.socials != undefined) this.socials = e.socials;
            if (e.globals != undefined) this.globals = e.globals;
            this.updateOverall();
        });
    },
    props: [],
    mounted() {},
    methods: {
        updateOverall() {
            setTimeout(() => {
                if (!this.page && !this.nav) {
                    this.stillLoading = false;
                    this.overall = "";
                }
            }, 50);
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/loading-spinner.css";
</style>