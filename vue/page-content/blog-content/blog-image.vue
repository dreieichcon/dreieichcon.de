<template>
    <div>
        <div class="blog-content-wrapper">
            <div v-if="post.hasTitle" class="">
                <div
                    class="blog-image-title"
                    v-html="post.get('title', $language)"
                ></div>
                <div class="blog-separator"></div>
            </div>
            <div class="blog-image-aligner">
                <div class="blog-image-wrapper">
                    <div class="blog-image-image">
                        <img
                            class="blog-img"
                            :src="post.getImage($language)"
                            :alt="post.get('image_alt', $language)"
                        />
                    </div>
                    <div
                        class="blog-image-subtitle"
                        v-html="post.get('subtitle', $language)"
                    ></div>
                </div>
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
    props: ["post", "index"],
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
@import "css/components/page-blog.css";
</style>