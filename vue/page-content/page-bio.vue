<template>
    <div>
        <div
            v-for="(entry, index) in biography.collection"
            :key="index"
            class="
                container-liquid
                bio-container
                animate__animated animate__fadeInDown
            "
            :style="{ 'animation-delay': (index + 1) / 10 + 's' }"
        >
            <div v-if="index > 0" class="bio-separator-large"></div>
            <div>
                <div class="bio-content-wrapper">
                    <div class="bio-wrapper">
                        <div class="bio-reverser">
                            <div
                                class="bio-image"
                                v-if="entry.getImage($language)"
                            >
                                <img
                                    :src="entry.getImage($language)"
                                    :alt="entry.get('image_alt', $language)"
                                />
                            </div>
                            <div class="bio-title-container">
                                <div
                                    class="bio-name"
                                    v-html="entry.get('title', $language)"
                                ></div>
                                <div
                                    class="bio-short"
                                    v-html="entry.get('short', $language)"
                                ></div>
                                <div class="bio-separator"></div>
                            </div>
                        </div>
                        <div
                            class="bio-content"
                            v-html="entry.get('content', $language)"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bio-gallery-title-wrapper" v-if="biography.hasGallery">
            <div class="bio-separator-large"></div>
            <div
                class="bio-gallery-title-text"
                v-html="biography.getGalleryTitle($language)"
            ></div>
        </div>
    </div>
</template>

<script>
module.exports = {
    name: "page-bio",
    data: function () {
        return {};
    },
    created() {},
    props: ["biography"],
    mounted() {},
    methods: {},
    components: {},
};
</script>

<style>
@import "css/components/page-bio.css";
</style>
