<template>
    <div class="container-fluid socials-bar gradient-border">
        <div class="dreieichcon-header">DREIEICHCON 2022</div>
        <div class="bar-icons gradient-border">
            <template v-for="(link, index) in socials">
                <a
                    :style="{ 'animation-delay': (index + 1) / 10 + 's' }"
                    class="icon-wrapper animate__animated animate__fadeIn"
                    v-bind:href="link.link"
                    v-bind:key="link"
                >
                    <div class="icon-border icon-border-gradient">
                        <img class="socials-icon" v-bind:src="link.icon" />
                    </div>
                </a>
            </template>
        </div>
    </div>
</template>

<script>
export default {
    name: "socials-bar",
    data: function () {
        return {};
    },
    created() {},
    props: ["socials"],
    mounted() {},
    methods: {},
    components: {},
};
</script>

<style>
@import "css/components/socials-bar.css";
</style>