<template>
    <nav class="navbar navbar-expand-lg nav-bar">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li
                    v-for="element in elements"
                    v-bind:key="element"
                    class="nav-element"
                >
                    <a class="nav-base" href="#">
                        {{
                            language == "de"
                                ? element.title_de
                                : element.title_en
                        }}
                    </a>
                    <div v-if="element.options.length > 0" class="nav-drop">
                        <div class="drop-positioner">
                            <a
                                v-for="option in element.options"
                                v-bind:key="option"
                                class="menu-option"
                                @click="navigate(option.page_id)"
                            >
                                {{
                                    language == "de"
                                        ? option.title_de
                                        : option.title_en
                                }}
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
module.exports = {
    name: "nav-bar",
    data: function () {
        return {};
    },
    created() {},
    props: ["elements", "language"],
    mounted() {},
    methods: {
        navigate(page) {
            console.log("GOTO: " + page);
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/nav-bar.css";
</style>