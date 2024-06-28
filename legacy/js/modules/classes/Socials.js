import { ContentCollection, ContentItem } from "./ContentItem.js";

export class SocialItem extends ContentItem {
    constructor(data) {
        super();
        this.icon = data.icon
        this.href = data.href
    }
}

export class Socials extends ContentCollection {
    constructor(data) {
        super();
        Object.entries(data.socials).forEach(kv => {
            this.collection.push(new SocialItem(kv[1]))
        })
    }
}