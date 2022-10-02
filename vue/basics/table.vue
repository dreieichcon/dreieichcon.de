<template>
    <div class="content">
        <table class="web">
            <tr class="header-row">
                <th
                    v-for="(heading, index) in headings"
                    :key="heading"
                    :style="getTableStyle(index, headings.length)"
                >
                    {{ heading }}
                </th>
            </tr>
            <tr v-for="(row, rowindex) in rows" :key="row">
                <td
                    v-for="(data, i) in row.getTableRow($language)"
                    :key="data"
                    v-html="data.data"
                    :style="getTableStyle(i, headings.length)"
                    :class="getRowStyle(rowindex)"
                ></td>
            </tr>
        </table>
        <div class="mobile">
            <div
                v-for="(row, index) in rows"
                :key="row"
                class="mobile-rowgroup"
                :style="getMobileBorders(index, rows.length)"
            >
                <div
                    v-for="data in row.getTableRow($language)"
                    :key="data"
                    class="mobile-row"
                >
                    <div class="mobile-heading" v-html="data.heading"></div>
                    <div class="mobile-data" v-html="data.data"></div>
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
    props: ["headings", "rows"],
    mounted() {},
    methods: {
        getRowStyle(index) {
            if (index % 2 != 0) {
                return "row-two";
            }
            return "row-one";
        },
        getTableStyle(index, count) {
            var percentage = 100 / count + "%";

            var returner = {
                "max-width": percentage,
                "min-width": percentage,
            };

            if (index < count - 1) {
                returner["border-right"] = "1px solid var(--borders)";
            }

            return returner;
        },
        getMobileBorders(index, count) {
            if (index < count - 1) {
                return { "border-bottom": "1px solid" };
            }
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/basics/table.css";
</style>