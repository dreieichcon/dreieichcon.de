<template>
    <div class="container-fluid socials-bar gradient-border">
        <div class="dreieichcon-header">DREIEICHCON 2022</div>
        <div class="bar-icons gradient-border">
            <template v-for="(link, index) in socials">
                <a
                    :style="{ 'animation-delay': (index + 1) / 10 + 's' }"
                    class="icon-wrapper animate__animated animate__fadeIn"
                    v-bind:href="link.link"
                    :key="index"
                >
                    <div class="icon-border icon-border-gradient">
                        <img class="socials-icon" v-bind:src="link.icon" />
                    </div>
                </a>
            </template>
        </div>
        <div class="hamburger icon-wrapper bar-icons" @click="toggle()">
            <div class="icon-border icon-border-gradient">
                <img
                    class="socials-icon"
                    src="resources/icons/svgs/solid/bars.svg"
                />
            </div>
        </div>
        <hamburger
            v-if="hamburger"
            v-bind:language="language"
            v-bind:elements="nav"
        ></hamburger>
    </div>
</template>

<script>
export default {
    name: "socials-bar",
    data: function () {
        return {
            hamburger: false,
        };
    },
    created() {
        this.emitter.on("navigate", () => (this.hamburger = false));
    },
    props: ["socials", "language", "nav"],
    mounted() {},
    methods: {
        toggle() {
            this.hamburger = !this.hamburger;
        },
    },
    components: {
        hamburger: Vue.defineAsyncComponent(() =>
            loadModule("vue/hamburger.vue", window.options)
        ),
    },
};
</script>

<style>
@import "css/components/socials-bar.css";
</style>