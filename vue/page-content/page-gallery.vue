<template>
    <div class="gallery container-fluid">
        <div
            v-for="(item, index) in gallery.items"
            :key="index"
            class="animate__animated animate__fadeIn gallery-wrapper d2"
            :style="{ 'animation-delay': (index + 1) / 10 + 's' }"
        >
            <div class="gallery-item" @click="navigateOrEmbiggen(item)">
                <div class="gallery-image">
                    <img
                        :src="item.getImage(language)"
                        :alt="item.getAlt(language)"
                    />
                </div>
                <div class="title" v-html="item.getTitle(language)"></div>
                <div class="subtitle" v-html="item.getSubtitle(language)"></div>
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
    props: ["gallery", "language"],
    mounted() {},
    methods: {
        navigateOrEmbiggen(item) {
            if (item.page_id != null)
                this.emitter.emit("navigate", { id: item.page_id });
            else {
                this.emitter.emit("image-overlay", {
                    src: item.getImage(language),
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