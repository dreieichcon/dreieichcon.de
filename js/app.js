
var app = Vue.createApp({
    data() {
        return window.data;
    },
    created() {
        this.emitter.on("*", (e, data) => console.log(e, data));
        this.emitter.on("navigate", (data) => this.navigate(data))
    },
    mounted() {

        var params = new URLSearchParams(window.location.search);
        var page = 1

        if (params.has("p"))
            page = params.get("p");

        window.getNav().then(
            navigation => {
                this.nav = ContentLoader.getNav(navigation);
            }
        ).finally(
            e => setTimeout(q => {
                this.emitter.emit("loading", { nav: false })
                this.emitter.emit("navigate", { id: page });
            }
                , 250
            )
        );

        window.getSocials().then(
            socials => {
                this.socials = socials
            })
            .catch(error => {
                console.log(error)
                this.socials = window.fallbackSocials;
            });

        window.getGlobals().then(
            globals => this.globals.setData(globals)
        );

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
                        setTimeout(function () {
                            this.emitter.emit("loading", { page: false })
                        }, 250)
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
        "hamburger-click": Vue.defineAsyncComponent(() => loadModule("vue/hamburger-click.vue", window.options)),
    },
})


const emitter = mitt()
app.config.globalProperties.emitter = emitter;
app.config.globalProperties.$language = Vue.ref("de");
app.config.globalProperties.$editMode = false;
app.config.globalProperties.$hamburger = Vue.ref(false);

window.emitter = emitter;

var app = app.mount("#app")