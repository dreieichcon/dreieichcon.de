<template>
    <div v-if="visible" class="container-fluid header-bar gradient-border">
        <div class="header-logo-large">
            <img
                class="header-logo-img"
                src="resources/img/dreieichcon-logo-vislani.png"
            />
        </div>
        <a v-bind:href="shoplink" class="main-link">
            <div class="main-link-flex">
                <div class="main-link-icon">
                    <img
                        class="header-icon"
                        src="resources/icons/svgs/solid/ticket-alt.svg"
                    />
                </div>
                <div class="main-link-text-group">
                    <div class="main-link-title">
                        {{
                            language == "de" ? header.title_de : header.title_en
                        }}
                    </div>
                    <div class="main-link-subtitle">
                        {{
                            language == "de"
                                ? header.subtitle_de
                                : header.subtitle_en
                        }}
                    </div>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
module.exports = {
    name: "header-bar",
    data: function () {
        return {};
    },
    created() {},
    props: ["visible", "header", "language", "shoplink"],
    mounted() {},
    methods: {},
    components: {},
};
</script>

<style>
@import "css/components/header-bar.css";
</style>