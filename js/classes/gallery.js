class GalleryImage {
    constructor(data) {
        this.title_de = data.page_gallery_text_de;
        this.title_en = data.page_gallery_text_en;
        this.subtitle_de = "";
        this.subtitle_en = "";
        this.image_de = data.page_gallery_image_href_de
        this.image_en = data.page_gallery_image_href_en;
        this.image_alt_de = data.page_gallery_image_alt_de;
        this.image_alt_en = data.page_gallery_image_alt_en;
        this.page_id = data.page_id_link;
        this.base = ""
    }


    getSubtitle(language) {
        if (language === "de") return this.subtitle_de;
        return this.subtitle_en;
    }

    getTitle(language) {
        if (language === "de") return this.title_de;
        return this.title_en;
    }

    getImage(language) {
        if (language === "de") return this.base + this.image_de;
        return this.base + this.image_en;
    }

    getAlt(language) {
        if (language === "de") return this.image_alt_de;
        return this.image_alt_en;
    }
}

class Gallery {

    constructor(data) {
        this.type = "gallery"
        this.items = []

        this.title_de = data.page_title_de
        this.title_en = data.page_title_en

        if (data.page_content.gallery === undefined) return;
        data.page_content.gallery.forEach(x => {
            x.base = "/upload/gallery/img/"
            this.items.push(new GalleryImage(x))
        }
        )
    }

    getTitle(language) {
        if (language === "de") return this.title_de;
        return this.title_en;
    }

    static parseBioGallery(data) {
        var d = {
            page_gallery_image_href_de: data.page_bio_gallery_image_href_de,
            page_gallery_image_href_en: data.page_bio_gallery_image_href_en,
            page_gallery_image_alt_de: data.page_bio_gallery_image_alt_de,
            page_gallery_image_alt_en: data.page_bio_gallery_image_alt_en,
            page_gallery_text_de: data.page_bio_gallery_text_de,
            page_gallery_text_en: data.page_bio_gallery_text_en
        };
        console.log(d)
        return d;
    }
}