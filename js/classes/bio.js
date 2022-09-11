class BioContent extends ContentItem {
    constructor(data) {
        super();
        this.title_de = data.page_bio_name_de;
        this.title_en = data.page_bio_name_en;
        this.short_de = data.page_bio_short_bio_de;
        this.short_en = data.page_bio_short_bio_en;
        this.content_de = data.page_bio_content_de;
        this.content_en = data.page_bio_content_en;
        this.image_de = "noimg.png" //data.page_bio_image_de;
        this.image_en = data.page_bio_image_en;
        this.image_alt_de = data.page_bio_image_alt_de;
        this.image_alt_en = data.page_bio_image_alt_en;
        this.base = "/upload/bio_gallery/img/";
    }
}


class Biography extends ContentItem {
    constructor(data) {

        super();
        console.log(data)
        this.type = "bio"
        this.title_de = data.page_title_de
        this.title_en = data.page_title_en

        this.content = [];

        this.gallery = {
            items: []
        };

        if (data.page_content.bio === undefined) return;

        data.page_content.bio.forEach(element => {

            this.content.push(new BioContent(element))

            if (element.gallery.length > 0) {
                element.gallery
                    .forEach(
                        x => {
                            var data = Gallery.parseBioGallery(x)
                            var galleryItem = new GalleryImage(data);
                            galleryItem.base = "/upload/bio_gallery/img/"
                            this.gallery.items.push(
                                galleryItem)
                        }
                    );
            }
        });
    }

    hasGallery() {
        return this.gallery.items.length > 0;
    }

    getGalleryTitle(language) {
        var names = ""
        this.content.forEach((x, i) => {
            if (i < this.content.length && this.content.length > 1) {
                names += x.title_de + " & "
            }
            else names += x.title_de;
        });

        if (language === "de") return "Galerie von " + names;
        return "Gallery of " + names;
    }
}