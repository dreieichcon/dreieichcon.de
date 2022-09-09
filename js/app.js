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

        window.getNav().then(
            navigation => {
                this.nav = this.nav.concat(navigation)
            }
        )

        window.getSocials().then(
            socials => {
                this.socials = socials
            })
            .catch(error => {
                console.log(error)
                this.socials = window.fallbackSocials;
            });

        window.getGlobals().then(
            globals => console.log(globals)
        )
    },
    methods: {
        navigate(data) {
            if (data.id == 1) {
                this.activePage = window.homepage;
                return;
            }

            if (data.id > 1) {
                this.activePage = window.galleryPage;
            }
        }
    },
    components: {
        "socials-bar": Vue.defineAsyncComponent(() => loadModule("vue/socials-bar.vue", window.options)),
        "header-bar": Vue.defineAsyncComponent(() => loadModule("vue/header-bar.vue", window.options)),
        "nav-bar": Vue.defineAsyncComponent(() => loadModule("vue/nav-bar.vue", window.options)),
        "page-content": Vue.defineAsyncComponent(() => loadModule("vue/page-content.vue", window.options)),
        "page-footer": Vue.defineAsyncComponent(() => loadModule("vue/page-footer.vue", window.options)),
        "image-overlay": Vue.defineAsyncComponent(() => loadModule("vue/image-overlay.vue", window.options)),
    }
})


const emitter = mitt()
app.config.globalProperties.emitter = emitter


var app = app.mount("#app")