class NavChild extends ContentItem {
    constructor(data) {
        super();
        this.title_de = this.parseData(data.navigation_title_de);
        this.title_en = this.parseData(data.navigation_title_en);
        this.page_id = data.page_id;
        this.href = data.navigation_href;
        if (data.navigation_special_page != null) this.page_id = data.navigation_special_page;
    }
}

class NavItem extends ContentItem {
    constructor(data) {
        super();
        this.title_de = this.parseData(data.navigation_title_de);
        this.title_en = this.parseData(data.navigation_title_en);
        this.page_id = data.page_id;
        this.href = data.navigation_href;

        if (data.navigation_special_page != null) this.page_id = data.navigation_special_page;

        this.options = []

        if (data.childs === undefined) return;
        data.childs.forEach(child => {
            this.options.push(new NavChild(child))
        })
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