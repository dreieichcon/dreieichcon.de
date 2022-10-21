<template>
    <div class="container-fluid program-wrapper">
        <vue-table
            :headings="games.headings"
            :rows="games.rows"
            :clickable="true"
        >
        </vue-table>
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