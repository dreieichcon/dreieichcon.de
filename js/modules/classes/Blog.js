import { ContentItem, ContentCollection } from "./ContentItem.js";

class BlogPost extends ContentItem {
    constructor(data) {
        super();
        this.type = "Post"
        this.title_de = data.page_blog_headline_de
        this.title_en = data.page_blog_headline_en
        this.subtitle_de = data.page_blog_subheadline_de
        this.subtitle_en = data.page_blog_subheadline_en
        this.content_de = data.page_blog_content_de
        this.content_en = data.page_blog_content_en
        this.image_de = data.page_blog_image_href_de
        this.image_en = data.page_blog_image_href_en
        this.image_alt_de = data.page_blog_image_alt_de
        this.image_alt_en = data.page_blog_image_alt_en
        this.base = "/upload/blog/img/"

        this.hasTitle = true;
    }
}

class BlogImage extends ContentItem {
    constructor(data) {
        super();
        this.type = "Image"
        this.title_de = data.page_blog_headline_de
        this.title_en = data.page_blog_headline_en
        this.subtitle_de = data.page_blog_subheadline_de
        this.subtitle_en = data.page_blog_subheadline_en
        this.content_de = data.page_blog_content_de
        this.content_en = data.page_blog_content_en
        this.image_de = data.page_blog_image_href_de
        this.image_en = data.page_blog_image_href_en
        this.image_alt_de = data.page_blog_image_alt_de
        this.image_alt_en = data.page_blog_image_alt_en
        this.base = "/upload/blog/img/"

        if (data.page_blog_content_type === "picture_noheadline")
            this.hasTitle = false;
        else
            this.hasTitle = true;
    }


}

export class Blog extends ContentCollection {
    constructor(data) {

        super();
        this.type = "blog"
        this.title_de = data.page_title_de
        this.title_en = data.page_title_en

        if (data.page_content.blog === undefined) return;
        data.page_content.blog.forEach(
            x => {
                if (x.page_blog_content_type === "post")
                    this.collection.push(new BlogPost(x))

                if (x.page_blog_content_type.startsWith("picture"))
                    this.collection.push(new BlogImage(x));
            })
    }
}