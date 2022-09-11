<template>
    <div v-if="isVisible" class="hamburger-flyout d2">
        <template v-for="(element, index) in elements.options" :key="index">
            <div v-if="index > 0" class="separator"></div>
            <div class="elements-wrapper">
                <div
                    class="top-element"
                    v-bind:style="isPointer(element)"
                    @click="navigate(element)"
                >
                    {{ element.getTitle($language) }}
                </div>
                <div
                    class="sub-element"
                    v-for="option in element.options"
                    :key="option"
                    v-bind:style="isPointer(option)"
                    @click="navigate(option)"
                >
                    - {{ option.getTitle($language) }}
                </div>
            </div>
        </template>
    </div>
</template>

<script>
module.exports = {
    name: "hambu",
    data: function () {
        return {
            isVisible: this.$hamburger.value,
        };
    },
    created() {},
    props: ["elements"],
    mounted() {},
    methods: {
        navigate(page) {
            if (page.href != null) {
                window.location.href = page.href;
                return;
            }

            this.emitter.emit("navigate", { id: page.page_id });
        },
        isPointer(page) {
            if (page.href != null || page.page_id != null) {
                return { cursor: "pointer" };
            }

            return "";
        },
    },
    watch: {
        "$hamburger.value": {
            handler: function () {
                this.isVisible = this.$hamburger.value;
            },
            deep: true,
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/hamburger.css";
</style>