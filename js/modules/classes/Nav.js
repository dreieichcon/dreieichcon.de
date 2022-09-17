import { ContentCollection, ContentItem } from "./ContentItem.js"

class NavChild extends ContentItem {
    constructor(data) {
        super();
        this.title_de = data.navigation_title_de;
        this.title_en = data.navigation_title_en;
        this.page_id = data.page_id;
        this.href = data.navigation_href;
        if (data.navigation_special_page != null) this.page_id = data.navigation_special_page;
    }
}

class NavItem extends ContentItem {
    constructor(data) {
        super();
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
}

export class NavCollection extends ContentCollection {
    constructor(data) {

        super();
        if (data === undefined) return;

        data.forEach(element => {
            this.collection.push(new NavItem(element))
        });
    }
}