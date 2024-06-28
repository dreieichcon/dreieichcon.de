<template>
    <div class="container-fluid program-wrapper">
        <div
            v-for="group in games.groups"
            v-bind:key="group"
            class="games-stack"
        >
            <div
                class="games-title"
                v-html="group.get('title', this.$language)"
            ></div>
            <vue-table
                :headings="group.headings"
                :rows="group.rows"
                :clickable="true"
            >
            </vue-table>
        </div>
    </div>
</template>

<script>
module.exports = {
    name: "page-games",
    data: function () {
        return {};
    },
    created() {},
    props: ["games"],
    mounted() {},
    methods: {},
    components: {},
};
</script>

<style>
@import "css/components/page-program.css";
</style>