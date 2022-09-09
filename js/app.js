
var app = Vue.createApp({
    data() {
        return window.data;
    },
    created() {
        this.emitter.on("*", (e, data) => console.log(e, data));
        this.emitter.on("navigate", (data) => this.navigate(data))
    },

    mounted() {
        window.getNav().then(
            navigation => {
                this.nav = ContentLoader.getNav(navigation)
            }
        ).finally(
            e => this.emitter.emit("loading", { nav: false })
        )

        window.getSocials().then(
            socials => {
                this.socials = socials
            })
            .catch(error => {
                console.log(error)
                this.socials = window.fallbackSocials;
            }).finally(
                e => this.emitter.emit("loading", { socials: false })
            )

        window.getGlobals().then(
            globals => console.log(globals)
        ).finally(
            e => this.emitter.emit("loading", { globals: false })
        )

        var params = new URLSearchParams(window.location.search);
        var page = 1

        if (params.has("p"))
            page = params.get("p");

        this.emitter.emit("navigate", { id: page });
        // window.getPage(page)
        //     .then(
        //         result => {
        //             this.activePage = ContentLoader.parseContent(result)
        //         })
        //     .catch(
        //         error => {

        //             this.activePage = ContentLoader.getError(error)

        //         })
        //     .finally(e => {
        //         this.emitter.emit("loading", { page: false })
        //     })
    },
    methods: {
        navigate(data) {

            if (data.id == null) return;

            this.activePage = {};

            window.history.replaceState("", "EEE", window.location.origin + "?p=" + data.id);

            if (data.id == "contact") {
                this.activePage = this.pageData.contact
            }

            if (data.id >= 1) {
                this.emitter.emit("loading", { page: true })
                window.getPage(data.id).then(
                    result => {
                        this.activePage = ContentLoader.parseContent(result)
                    }).catch(error => {
                        this.activePage = ContentLoader.getError(error)
                    }).finally((e) => {
                        this.emitter.emit("loading", { page: false })
                    })
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