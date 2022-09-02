<template>
    <div class="hamburger-flyout">
        <template v-for="(element, index) in elements" :key="index">
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
                    v-for="option in element.options"
                    :key="option"
                    v-bind:style="isPointer(element)"
                    @click="navigate(option.page_id)"
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
@import "css/components/hamburger.css";
</style>