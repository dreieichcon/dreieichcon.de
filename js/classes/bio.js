class BioContent {
    constructor(data) {
        this.content_de = data.page_bio_content_de;
        this.content_en = data.page_bio_content_en;
    }
}


class Biography {
    constructor(data) {

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
            this.content.push(new BioContent(data))
        });

        data.page_content.bio.forEach(element => {
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
        })
    }

    getTitle(language) {
        if (language === "de") return this.title_de;
        return this.title_en;
    }

    hasGallery() {
        return this.gallery.items.length > 0;
    }
}