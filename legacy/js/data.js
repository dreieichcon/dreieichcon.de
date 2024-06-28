import { NavCollection } from "./modules/classes/Nav.js";
import { Globals } from "./modules/classes/Globals.js";

window.data = {
    socials:
        [],
    globals: new Globals(),
    nav: new NavCollection([
        {
            navigation_title_de: "Home",
            navigation_title_en: "Home",
            page_id: 1
        }
    ]),
    settings: {
    },
    activePage: {
    },
}

window.debug = function (data) {
    var debug = true;
    if (debug) console.log(data)
}