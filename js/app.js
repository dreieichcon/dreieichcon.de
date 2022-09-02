var app = Vue.createApp({
    data() {
        return window.data;
    },
    created() {
        this.emitter.on("*", (e, data) => console.log(e, data));
        this.emitter.on("navigate", (data) => this.navigate(data))
    },

    mounted() {
        console.log("Vue Mounted")
        console.log(data);
    },
    methods: {
        navigate(data) {
            if (data.id == 1) {
                this.visibility.header = true;
                this.activePage = window.data.activePage;
                return;
            }

            if (data.id > 1) {
                this.visibility.header = false;
                console.log(this.visibility)
            }
            // this.activePage = {};
        }
    },
    components: {
        "socials-bar": Vue.defineAsyncComponent(() => loadModule("vue/socials-bar.vue", window.options)),
        "header-bar": Vue.defineAsyncComponent(() => loadModule("vue/header-bar.vue", window.options)),
        "nav-bar": Vue.defineAsyncComponent(() => loadModule("vue/nav-bar.vue", window.options)),
        "page-content": Vue.defineAsyncComponent(() => loadModule("vue/page-content.vue", window.options)),
        "page-footer": Vue.defineAsyncComponent(() => loadModule("vue/page-footer.vue", window.options)),
    }
})


const emitter = mitt()
app.config.globalProperties.emitter = emitter


var app = app.mount("#app")