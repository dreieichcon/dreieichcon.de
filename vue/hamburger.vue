<template>
    <div v-if="isVisible" class="hamburger-flyout d2">
      <div class="elements-wrapper">
        <div class="top-element" style="cursor: pointer;" @click="changeLanguage()">
          {{ getTitle() }}
        </div>
      </div>
        <template v-for="(element, index) in elements.collection" :key="index">
            <div class="elements-wrapper">
                <div
                    class="top-element"
                    v-bind:style="isPointer(element)"
                    @click="navigate(element)"
                >
                    {{ element.get("title", this.$language.value) }}
                </div>
                <div
                    class="sub-element"
                    v-for="option in element.options"
                    :key="option"
                    v-bind:style="isPointer(option)"
                    @click="navigate(option)"
                >
                    - {{ option.get("title", this.$language.value) }}
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
      changeLanguage() {
        if (this.$language.value === "de") this.$language.value = "en";
        else this.$language.value = "de";
      },
      getTitle() {
        if (this.$language.value === "de") return "View in English";
        else return "auf Deutsch anzeigen"
      }
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