<template>
    <div class="hamburger-flyout">
        <template v-for="(element, index) in elements">
            <div v-if="index > 0" class="separator"></div>
            <div class="elements-wrapper">
                <div
                    class="top-element"
                    v-bind:style="isPointer(element)"
                    @click="navigate(element.page_id)"
                >
                    {{ getTitle(element) }}
                </div>
                <div
                    class="sub-element"
                    v-for="option in element.childs"
                    :key="option"
                    v-bind:style="isPointer(option)"
                    @click="navigate(option)"
                >
                    - {{ getTitle(option) }}
                </div>
            </div>
        </template>
    </div>
</template>

<script>
module.exports = {
    name: "hamburger",
    data: function () {
        return {};
    },
    created() {},
    props: ["elements", "language"],
    mounted() {},
    methods: {
        navigate(page) {
            if (page.navigation_href != null) {
                window.location.href = page.navigation_href;
                return;
            }

            this.emitter.emit("navigate", { id: page.page_id });
        },
        getTitle(element) {
            if (this.language == "de") return element.navigation_title_de;
            return element.navigation_title_en;
        },
        isPointer(page) {
            if (page.navigation_href != null || page.page_id != null) {
                console.log(page);
                return { cursor: "pointer" };
            }

            return "";
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/hamburger.css";
</style>