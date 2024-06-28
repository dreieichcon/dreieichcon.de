import { ContentItem, ContentCollection } from "./ContentItem.js";

class BlogPost extends ContentItem {
    constructor(data) {
        super();
        this.type = "Post"
        this.set("title_de", data.page_blog_headline_de)
        this.set("title_en", data.page_blog_headline_en)
        this.set("subtitle_de", data.page_blog_subheadline_de)
        this.set("subtitle_en", data.page_blog_subheadline_en)
        this.set("content_de", data.page_blog_content_de)
        this.set("content_en", data.page_blog_content_en)
        this.set("image_de", data.page_blog_image_href_de)
        this.set("image_en", data.page_blog_image_href_en)
        this.set("image_alt_de", data.page_blog_image_alt_de)
        this.set("image_alt_en", data.page_blog_image_alt_en)
        this.set("image_copy_de", data.page_blog_image_copy_de)
        this.set("image_copy_en", data.page_blog_image_copy_en)
        this.base = "/upload/blog/img/"

        this.hasTitle = true;
    }
}

class BlogImage extends ContentItem {
    constructor(data) {
        super();
        this.type = "Image"
        this.set("title_de", data.page_blog_headline_de)
        this.set("title_en", data.page_blog_headline_en)
        this.set("subtitle_de", data.page_blog_subheadline_de)
        this.set("subtitle_en", data.page_blog_subheadline_en)
        this.set("content_de", data.page_blog_content_de)
        this.set("content_en", data.page_blog_content_en)
        this.set("image_de", data.page_blog_image_href_de)
        this.set("image_en", data.page_blog_image_href_en)
        this.set("image_alt_de", data.page_blog_image_alt_de)
        this.set("image_alt_en", data.page_blog_image_alt_en)
        this.set("image_copy_de", data.page_blog_image_copy_de)
        this.set("image_copy_en", data.page_blog_image_copy_en)

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