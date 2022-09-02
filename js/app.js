var app = Vue.createApp({
    data() {
        return window.data;
    },
    created() {

    },
    mounted() {
        console.log("Vue Mounted")
        console.log(data);
    },
    components: {
        "socials-bar": Vue.defineAsyncComponent(() => loadModule("vue/socials-bar.vue", window.options)),
        "header-bar": Vue.defineAsyncComponent(() => loadModule("vue/header-bar.vue", window.options)),
        "nav-bar": Vue.defineAsyncComponent(() => loadModule("vue/nav-bar.vue", window.options)),
        "page-content": Vue.defineAsyncComponent(() => loadModule("vue/page-content.vue", window.options)),
        "page-footer": Vue.defineAsyncComponent(() => loadModule("vue/page-footer.vue", window.options)),
    }
})


var app = app.mount("#app")