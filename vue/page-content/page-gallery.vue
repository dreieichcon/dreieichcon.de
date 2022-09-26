<template>
    <div class="gallery container-fluid">
        <div
            v-for="(item, index) in gallery.collection"
            :key="index"
            class="animate__animated animate__fadeIn gallery-wrapper d2"
            :style="{ 'animation-delay': (index + 1) / 10 + 's' }"
        >
            <div class="gallery-item" @click="navigateOrEmbiggen(item)">
                <div class="gallery-image">
                    <img
                        :src="item.getImage($language)"
                        :alt="item.get('image_alt', $language)"
                    />
                </div>
                <div class="title" v-html="item.get('title', $language)"></div>
                <div
                    class="subtitle"
                    v-html="item.get('subtitle', $language)"
                ></div>
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
    props: ["gallery"],
    mounted() {},
    methods: {
        navigateOrEmbiggen(item) {
            if (item.page_id != null)
                this.emitter.emit("navigate", { id: item.page_id });
            if (item.page_href != null)
                this.emitter.emit("navigate", { href: item.page_href });
            else {
                this.emitter.emit("image-overlay", {
                    src: item.getImage(this.$language),
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