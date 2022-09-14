<template>
    <div
        v-if="visible"
        class="
            container-fluid
            header-bar
            gradient-border
            animate__animated animate__fadeIn
        "
        :style="style"
    >
        <div class="header-logo-large">
            <img
                class="header-logo-img"
                src="resources/img/dreieichcon-logo-vislani.png"
            />
        </div>
        <shoplink></shoplink>
    </div>
</template>

<script>
module.exports = {
    name: "header-bar",
    data() {
        return {
            visible: true,
            style: {},
        };
    },
    methods: {
        toggle(value) {
            if (value === false) {
                this.style = { height: 0, transition: "height .25s" };
            } else {
                this.visible = value;
                this.style = { transition: "height .25s" };
            }

            var vm = this;

            setTimeout(function () {
                vm.visible = value;
            }, 250);
        },
    },
    created() {
        this.emitter.on("navigate", (data) => {
            if (data.id == null) return;

            if (data.id > 1 || data.id.length > 4) {
                this.toggle(false);
            } else {
                this.toggle(true);
            }
        });
    },
    props: ["header", "language", "shoplink"],
    mounted() {},

    components: {
        shoplink: Vue.defineAsyncComponent(() =>
            loadModule("vue/header-content/shoplink.vue", window.options)
        ),
    },
};
</script>

<style>
@import "css/components/header-bar.css";
</style>