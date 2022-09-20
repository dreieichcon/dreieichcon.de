import { NavManager } from "./modules/NavManager.js";
import { ContentManager } from "./modules/ContentManager.js";
import { ContactFormManager } from "./modules/ContactFormManager.js";

var app = Vue.createApp({
    data() {
        return window.data;
    },
    created() {
        this.emitter.on("*", (e, data) => console.log(e, data));
        this.emitter.on("navigate", (data) => this.navigate(data))
        this.emitter.on("contact", (data) => this.post(data))
    },
    mounted() {

        var params = new URLSearchParams(window.location.search);
        var page = 1

        if (params.has("p"))
            page = params.get("p");

        NavManager.getNav()
            .then(nav => this.nav = NavManager.createNav(nav))
            .finally(
                e => setTimeout(q => {
                    this.emitter.emit("loading", { nav: false })
                    this.emitter.emit("navigate", { id: page });
                }
                    , 250
                )
            );

        ContentManager.getSocials()
            .then(socials => this.socials = socials)

        ContentManager.getGlobals().then(
            globals => this.globals.setData(globals)
        );

    },
    methods: {
        navigate(data) {

            if (data.href != undefined) {
                window.location.href = data.href;
                return;
            }

            if (data.id == null) return;

            this.emitter.emit("loading", { page: true });

            this.activePage = {};

            window.history.replaceState("", "EEE", window.location.origin + "?p=" + data.id);

            ContentManager.getPage(data.id)
                .then(result => this.activePage = result)
                .catch(result => this.activePage = result)
                .finally((e) => {
                    setTimeout(function () {
                        this.emitter.emit("loading", { page: false })
                    }, 250)
                })
        },
        post(data) {
            ContactFormManager
                .send(data)
                .then(r => this.emitter.emit("contact-response", r))
                .catch(r => this.emitter.emit("contact-response", r))
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

app.component("vue-table", Vue.defineAsyncComponent(() => loadModule("vue/basics/table.vue", window.options)))

var app = app.mount("#app")