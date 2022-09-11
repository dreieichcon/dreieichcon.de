<template>
    <div>
        <loading-spinner></loading-spinner>
        <template v-if="content.type === 'blog'">
            <div class="main-title" v-html="content.getTitle($language)"></div>
            <page-blog v-bind:blog="content"></page-blog>
        </template>
        <template v-if="content.type === 'gallery'">
            <div class="main-title" v-html="content.getTitle($language)"></div>
            <page-gallery v-bind:gallery="content"></page-gallery>
        </template>
        <template v-if="content.type === 'bio'">
            <div class="main-title" v-html="content.getTitle($language)"></div>
            <page-biography v-bind:biography="content"> </page-biography>
            <page-gallery
                v-if="content.hasGallery()"
                v-bind:gallery="content.gallery"
            ></page-gallery>
        </template>
    </div>
</template>

<script>
module.exports = {
    name: "page-content",
    data: function () {
        return {};
    },
    created() {},
    props: ["content"],
    mounted() {},
    methods: {},
    components: {
        "loading-spinner": Vue.defineAsyncComponent(() =>
            loadModule("vue/loading-spinner.vue", window.options)
        ),
        "page-blog": Vue.defineAsyncComponent(() =>
            loadModule("vue/page-content/page-blog.vue", window.options)
        ),
        "page-biography": Vue.defineAsyncComponent(() =>
            loadModule("vue/page-content/page-bio.vue", window.options)
        ),
        "page-gallery": Vue.defineAsyncComponent(() =>
            loadModule("vue/page-content/page-gallery.vue", window.options)
        ),
    },
};
</script>

<style>
@import "css/components/page-content.css";
</style>