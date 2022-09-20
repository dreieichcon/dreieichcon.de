import { ContentCollection, ContentItem } from "./ContentItem.js";
import { Gallery, GalleryImage } from "./Gallery.js";

export class BioItem extends ContentItem {
    constructor(data) {
        super();
        this.title_de = data.page_bio_name_de;
        this.title_en = data.page_bio_name_en;
        this.short_de = data.page_bio_short_bio_de;
        this.short_en = data.page_bio_short_bio_en;
        this.content_de = data.page_bio_content_de;
        this.content_en = data.page_bio_content_en;
        this.image_de = data.page_bio_image_de;
        this.image_en = data.page_bio_image_en;
        this.image_alt_de = data.page_bio_image_alt_de;
        this.image_alt_en = data.page_bio_image_alt_en;
        this.base = "/upload/bio_profile/img/";
    }
}

export class Bio extends ContentCollection {
    constructor(data) {
        super();
        this.type = "bio"
        this.title_de = data.page_title_de
        this.title_en = data.page_title_en
        this.hasGallery = false;

        this.gallery = {
            collection: []
        }

        if (data.page_content.bio === undefined) return;

        data.page_content.bio.forEach(element => {

            this.collection.push(new BioItem(element))

            if (element.gallery.length > 0) {
                this.hasGallery = true;
                element.gallery
                    .forEach(
                        x => {
                            var data = Gallery.parseBioGallery(x)
                            var galleryItem = new GalleryImage(data);
                            galleryItem.base = "/upload/bio_gallery/img/"
                            this.gallery.collection.push(
                                galleryItem)
                        }
                    );
            }
        });
    }

    getGalleryTitle(language) {
        var names = ""
        this.collection.forEach((x, i) => {
            if (i < this.collection.length - 1 && this.collection.length > 1) {
                names += x.title_de + " & "
            }
            else names += x.title_de;
        });

        if (language.value === "de") return "Galerie von " + names;
        return "Gallery of " + names;
    }
}