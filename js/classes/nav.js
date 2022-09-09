class NavChild {
    constructor(data) {
        this.title_de = data.navigation_title_de;
        this.title_en = data.navigation_title_en;
        this.page_id = data.page_id;
        this.href = data.navigation_href;
        if (data.navigation_special_page != null) this.page_id = data.navigation_special_page;
    }

    getTitle(language) {
        if (language === "de") return this.title_de;
        return this.title_en;
    }
}

class NavItem {
    constructor(data) {
        this.title_de = data.navigation_title_de;
        this.title_en = data.navigation_title_en;
        this.page_id = data.page_id;
        this.href = data.navigation_href;

        if (data.navigation_special_page != null) this.page_id = data.navigation_special_page;

        this.options = []

        if (data.childs === undefined) return;
        data.childs.forEach(child => {
            this.options.push(new NavChild(child))
        })
    }

    getTitle(language) {
        if (language === "de") return this.title_de;
        return this.title_en;
    }
}

class NavCollection {
    constructor(data) {

        this.title = "NavCollection"
        this.options = []

        if (data === undefined) return;

        data.forEach(element => {
            this.options.push(new NavItem(element))
        });
    }
}