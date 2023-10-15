<template>
    <div class="container-fluid socials-bar gradient-border">
        <div class="dreieichcon-header"></div>
        <div class="bar-icons gradient-border">
            <template v-for="(link, index) in socials.collection">
                <a
                    :style="{ 'animation-delay': (index + 1) / 10 + 's' }"
                    class="icon-wrapper animate__animated animate__fadeIn"
                    v-bind:href="link.href"
                    :key="index"
                >
                    <div class="icon-border icon-border-gradient">
                        <img class="socials-icon" v-bind:src="link.icon" />
                    </div>
                </a>
            </template>
            <div v-if="this.$language == 'de'">
              <div @click="toggle_language()">English</div>
            </div>
            <div v-else>
              <div @click="toggle_language()">Deutsch</div>
            </div>
        </div>
        <div class="hamburger icon-wrapper bar-icons" @click="toggle()">
            <div class="icon-border icon-border-gradient">
                <img
                    class="socials-icon"
                    src="resources/icons/svgs/solid/bars.svg"
                />
            </div>
        </div>
        <hamburger v-bind:elements="nav"></hamburger>
    </div>
</template>

<script>
export default {
    name: "socials-bar",
    data: function () {
        return {};
    },
    created() {
        this.emitter.on("navigate", () => (this.$hamburger.value = false));
    },
    props: ["socials", "nav", "globals"],
    mounted() {
        console.log(this.globals);
    },
    methods: {
        toggle() {
            this.$hamburger.value = !this.$hamburger.value;
            console.log(this.$hamburger.value);
        },
        toggle_language(){
            if (this.$language === "de") this.$language = "en";
            this.$language = "de";
        }
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