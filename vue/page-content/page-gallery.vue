<template>
    <div class="gallery container-fluid">
        <div
            v-for="(item, index) in items"
            :key="index"
            class="animate__animated animate__fadeIn gallery-wrapper d2"
            :style="{ 'animation-delay': (index + 1) / 10 + 's' }"
        >
            <div class="gallery-item">
                <div class="gallery-image" @click="navigateOrEmbiggen(item)">
                    <img :src="getImage(item)" :alt="getAlt(item)" />
                </div>
                <div class="title" v-html="getTitle(item)"></div>
                <div class="subtitle" v-html="getSubTitle(item)"></div>
            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    name: "",
    data: function () {
        return {};
    },
    created() {},
    props: ["items", "language"],
    mounted() {},
    methods: {
        getImage(item) {
            if (this.language === "de") return item.image_de;
            return item.image_en;
        },
        getAlt(item) {
            if (this.language === "de") return item.image_alt_de;
            return item.image_alt_en;
        },
        getTitle(item) {
            if (this.language === "de") return item.title_de;
            return item.title_en;
        },
        getSubTitle(item) {
            if (this.language === "de") return item.subtitle_de;
            return item.subtitle_en;
        },
        navigateOrEmbiggen(item) {
            if (item.page_id)
                this.emitter.emit("navigate", { page_id: item.page_id });
            else {
                this.emitter.emit("image-overlay", {
                    src: this.getImage(item),
                });
            }
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/page-gallery.css";
</style>