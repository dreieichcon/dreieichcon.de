import { ContentCollection, ContentItem } from "./ContentItem.js";
import { Gallery, GalleryImage } from "./Gallery.js";

export class BioItem extends ContentItem {
    constructor(data) {
        super();
        this.set("title_de", data.page_bio_name_de);
        this.set("title_en", data.page_bio_name_en);
        this.set("short_de", data.page_bio_short_bio_de);
        this.set("short_en", data.page_bio_short_bio_en);
        this.set("content_de", data.page_bio_content_de);
        this.set("content_en", data.page_bio_content_en);
        this.set("image_de", data.page_bio_image_de);
        this.set("image_en", data.page_bio_image_en);
        this.set("image_alt_de", data.page_bio_image_alt_de);
        this.set("image_alt_en", data.page_bio_image_alt_en);

        this.set("image_copy_de", data.page_bio_image_copy_de);
        this.set("image_copy_en", data.page_bio_image_copy_de);

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