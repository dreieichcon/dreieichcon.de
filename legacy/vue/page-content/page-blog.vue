<template>
    <div>
        <div
            v-for="(post, index) in blog.collection"
            :key="index"
            class="
                container-liquid
                blog-container
                animate__animated animate__fadeInDown
            "
            :style="{ 'animation-delay': (index + 1) / 10 + 's' }"
        >
            <div
                v-if="index > 0 && post.hasTitle"
                class="blog-separator-large"
            ></div>
            <blog-post
                v-if="post.type === 'Post'"
                v-bind:post="post"
                v-bind:index="index"
            ></blog-post>
            <blog-image
                v-if="post.type === 'Image'"
                v-bind:post="post"
                v-bind:index="index"
            ></blog-image>
        </div>
    </div>
</template>

<script>
module.exports = {
    name: "page-blog",
    data: function () {
        return {};
    },
    created() {},
    props: ["blog"],
    mounted() {},
    methods: {},
    components: {
        "blog-post": Vue.defineAsyncComponent(() =>
            loadModule(
                "vue/page-content/blog-content/blog-post.vue",
                window.options
            )
        ),
        "blog-image": Vue.defineAsyncComponent(() =>
            loadModule(
                "vue/page-content/blog-content/blog-image.vue",
                window.options
            )
        ),
    },
};
</script>

<style>
@import "css/components/page-content.css";
</style>
