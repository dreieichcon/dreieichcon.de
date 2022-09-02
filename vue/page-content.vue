<template>
    <div>
        <div class="main-title" v-html="getTitle(content)"></div>
        <template v-if="content.type === 'blog'">
            <page-blog
                v-bind:posts="content.content"
                v-bind:language="language"
            ></page-blog>
        </template>
        <template v-if="content.type === 'gallery'">
            <page-gallery
                v-bind:items="content.content"
                v-bind:language="language"
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
    props: ["content", "language"],
    mounted() {},
    methods: {
        getTitle(page) {
            if (this.language === "de") return page.title_de;
            return page.title_en;
        },
    },
    components: {
        "page-blog": Vue.defineAsyncComponent(() =>
            loadModule("vue/page-content/page-blog.vue", window.options)
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