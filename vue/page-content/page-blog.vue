<template>
    <div>
        <div
            v-for="(post, index) in posts"
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
                                v-if="getImage(post)"
                                :style="imageAlign(index)"
                            >
                                <img
                                    :src="getImage(post)"
                                    :alt="getAlt(post)"
                                />
                            </div>
                            <div class="blog-title-wrapper">
                                <div
                                    class="blog-title"
                                    v-html="getTitle(post)"
                                ></div>
                                <div
                                    class="blog-subtitle"
                                    v-html="getSubTitle(post)"
                                ></div>
                                <div class="blog-separator"></div>
                            </div>
                        </div>
                        <div
                            class="blog-content"
                            v-html="getContent(post)"
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
    props: ["posts", "language"],
    mounted() {},
    methods: {
        getImage(post) {
            if (this.language === "de") return post.image_de;
            return post.image_en;
        },
        getAlt(post) {
            if (this.language === "de") return post.image_alt_de;
            return post.image_alt_en;
        },
        getTitle(post) {
            if (this.language === "de") return post.title_de;
            return post.title_en;
        },
        getSubTitle(post) {
            if (this.language === "de") return post.subtitle_de;
            return post.subtitle_en;
        },
        getContent(post) {
            if (this.language === "de") return post.content_de;
            return post.content_en;
        },
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
