<template>
    <nav class="navbar navbar-expand-lg nav-bar gradient-border">
        <div class="collapse navbar-collapse h100" id="navbarNav">
            <ul class="navbar-nav h100">
                <li
                    v-for="element in elements"
                    v-bind:key="element"
                    class="nav-element"
                >
                    <div class="dropdown">
                        <div
                            class="toplevel-element"
                            v-bind:style="isPointer(element)"
                            @click="navigate(element.page_id)"
                        >
                            <div class="dropdown-title">
                                {{ getTitle(element) }}
                            </div>
                        </div>
                        <div class="dropdown-content">
                            <div
                                v-for="option in element.options"
                                :key="option"
                                v-bind:style="isPointer(option)"
                                class="dropdown-item"
                                @click="navigate(option.page_id)"
                            >
                                {{ getTitle(option) }}
                            </div>
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
            this.emitter.emit("navigate", { id: page });
        },
        getTitle(element) {
            if (this.language == "de") return element.title_de;
            return element.title_en;
        },
        isPointer(page) {
            if (page.href != null || page.page_id != null)
                return { cursor: "pointer" };
            return "";
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/nav-bar.css";
</style>