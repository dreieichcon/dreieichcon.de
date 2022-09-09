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

    components: {},
};
</script>

<style>
@import "css/components/header-bar.css";
</style>