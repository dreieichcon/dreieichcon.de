import { ContentItem } from "./ContentItem.js";

class ImageItem extends ContentItem {
    constructor(alt, href, copyright, language) {
        super();

        var imageKey = "image_" + language;
        var altKey = "image_alt_" + language;
        var copyrightKey = "image_cr_" + language;

        this.set(imageKey, href)
        this.set(altKey, alt)
        this.set(copyrightKey, copyright)
    }
}