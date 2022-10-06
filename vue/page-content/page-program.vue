<template>
    <div class="container-fluid program-wrapper">
        <vue-table
            :headings="program.headings"
            :rows="program.rows"
            :clickable="true"
        >
        </vue-table>
    </div>
</template>

<script>
module.exports = {
    name: "page-program",
    data: function () {
        return {};
    },
    created() {},
    props: ["program"],
    mounted() {},
    methods: {},
    components: {},
};
</script>

<style>
@import "css/components/page-program.css";
</style>