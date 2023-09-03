import { ContentItem, ContentCollection } from "./ContentItem.js";

export class GalleryImage extends ContentItem {
    constructor(data) {
        super();
        this.set("title_de", data.page_gallery_text_de);
        this.set("title_en", data.page_gallery_text_en);
        this.set("subtitle_de", "");
        this.set("subtitle_en", "");
        this.set("image_de", data.page_gallery_image_href_de);
        this.set("image_en", data.page_gallery_image_href_en);
        this.set("image_alt_de", data.page_gallery_image_alt_de);
        this.set("image_alt_en", data.page_gallery_image_alt_en);
        this.set("page_id", data.page_id_link);

        this.set("image_copy_de", data.page_gallery_image_copy_de);
        this.set("image_copy_en", data.page_gallery_image_copy_en);
        this.base = ""
        this.page_href = null;

        if (data.page_gallery_href != null) {
            this.page_href = data.page_gallery_href
            this.page_id = null;
        }
    }
}

export class Gallery extends ContentCollection {
    constructor(data) {
        super();

        this.type = "gallery"

        this.title_de = data.page_title_de
        this.title_en = data.page_title_en

        if (data.page_content.gallery === undefined) return;

        data.page_content.gallery.forEach(d => {
            var x = new GalleryImage(d);
            x.base = "/upload/gallery/img/"
            this.collection.push(x)
        })

        data.page_content.gallery.sort(function(a, b) {
            var textA = a.title_de.toUpperCase();
            var textB = b.title_de.toUpperCase();
            return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        });
    }

    static parseBioGallery(data) {
        var d = {
            page_gallery_image_href_de: data.page_bio_gallery_image_href_de,
            page_gallery_image_href_en: data.page_bio_gallery_image_href_en,
            page_gallery_image_alt_de: data.page_bio_gallery_image_alt_de,
            page_gallery_image_alt_en: data.page_bio_gallery_image_alt_en,
            page_gallery_text_de: data.page_bio_gallery_text_de,
            page_gallery_text_en: data.page_bio_gallery_text_en,
            page_gallery_image_copy_de: data.page_bio_gallery_image_copy_de,
            page_gallery_image_copy_en: data.page_bio_gallery_image_copy_en,
        };
        return d;
    }
}