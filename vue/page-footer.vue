<template>
    <div class="footer gradient-border flex">
        <div class="footer-container">
            <div
                v-for="(content, index) in footer.content"
                class="footer-object"
                :key="index"
            >
                <div
                    class="footer-header"
                    v-html="content.getTitle($language)"
                ></div>
                <div
                    class="footer-content"
                    v-html="content.getContent($language)"
                ></div>
            </div>
        </div>
        <div class="footer-container-links">
            <div v-for="(link, index) in footer.links" :key="index">
                <a
                    v-bind:href="link.href"
                    v-html="getLink(link, index, footer.links)"
                    class="footer-a"
                >
                </a>
            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    name: "page-footer",
    data: function () {
        return {};
    },
    created() {},
    props: ["footer"],
    mounted() {},
    methods: {
        getLink(item, index, items) {
            var ret = "<div class='footer-link'>";
            ret += item.getTitle(this.$language);
            ret += "</div>";

            if (index >= 0 && index < items.length - 1) {
                ret += "<div class='footer-sep'>|</div>";
            }

            return ret;
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/page-footer.css";
</style>