<template>
    <div>
        <div
            v-for="(post, index) in blog.posts"
            :key="index"
            class="
                container-liquid
                blog-container
                animate__animated animate__fadeInDown
            "
            :style="{ 'animation-delay': (index + 1) / 10 + 's' }"
        >
            <div v-if="index > 0" class="blog-separator-large"></div>
            <div>
                <div class="blog-content-wrapper">
                    <div class="blog-wrapper">
                        <div class="blog-reverser" :style="titleAlign(index)">
                            <div
                                class="blog-image"
                                v-if="post.getImage($language)"
                                :style="imageAlign(index)"
                            >
                                <img
                                    :src="post.getImage($language)"
                                    :alt="post.getAlt($language)"
                                />
                            </div>
                            <div class="blog-title-wrapper">
                                <div
                                    class="blog-title"
                                    v-html="post.getTitle($language)"
                                ></div>
                                <div
                                    class="blog-subtitle"
                                    v-html="post.getSubtitle($language)"
                                ></div>
                                <div class="blog-separator"></div>
                            </div>
                        </div>
                        <div
                            class="blog-content"
                            v-html="post.getContent($language)"
                        ></div>
                    </div>
                </div>
            </div>
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
    methods: {
        imageAlign(index) {
            // if (window.innerWidth < 995) return { float: "none" };
            if (index % 2 == 0)
                return { float: "left", "padding-right": "1rem" };
            return { float: "right", "padding-left": "1rem" };
        },
        titleAlign(index) {
            if (index % 2 != 0) return { "align-items": "flex-end" };
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/page-content.css";
</style>
