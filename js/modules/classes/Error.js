import { ContentItem } from "./ContentItem.js";

export class Error extends ContentItem {
    constructor(data) {
        super();
        this.type = "error"
        this.title_de = "Oh nein ..."
        this.title_en = "Oh no ..."
        this.subtitle_de = "... da ist etwas schiefgelaufen."
        this.subtitle_en = "... something went wrong."

        this.image_de = "error.png"
        this.image_en = this.image_de

        this.content_de = data.message;
        this.content_en = this.content_de

        this.base = "/resources/img/"
    }
}