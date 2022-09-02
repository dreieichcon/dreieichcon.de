<template>
    <div v-show="visible" class="overlay-master">
        <div class="overlay-close" @click="close()">
            <img
                class="icon"
                src="resources/icons/svgs/regular/window-close.svg"
            />
        </div>
        <div class="overlay-image-wrapper">
            <img v-bind:src="src" class="overlay-image" />
        </div>
    </div>
</template>

<script>
module.exports = {
    name: "image-overlay",
    data: function () {
        return {
            visible: false,
            src: "",
        };
    },
    created() {
        var vm = this;
        this.emitter.on("image-overlay", (data) => {
            console.log(data.src);
            vm.src = data.src;
            vm.visible = true;
        });
    },
    props: [],
    mounted() {},
    methods: {
        close() {
            this.visible = false;
            this.src = "";
        },
    },
    components: {},
};
</script>

<style>
@import "css/components/image-overlay.css";
</style>