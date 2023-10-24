<template>
    <div class="container-fluid program-wrapper">
        <vue-table
            :headings="getHeaders(program)"
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
  methods: {
    getHeaders(group){
      return group.getHeadings(group, this.$language.value);
    }
  },
    components: {},
};
</script>

<style>
@import "css/components/page-program.css";
</style>