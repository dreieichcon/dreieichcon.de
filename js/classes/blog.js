class BlogPost extends ContentItem {
    constructor(data) {
        super();
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
    }
}

class BlogTable {
    constructor(data) {

    }
}

class BlogImage {
    constructor(data) {

    }
}

class Blog extends ContentItem {

    constructor(data) {

        super();
        this.type = "blog"
        this.posts = [];
        this.title_de = data.page_title_de
        this.title_en = data.page_title_en

        if (data.page_content.blog === undefined) return;
        data.page_content.blog.forEach(x => this.posts.push(new BlogPost(x)))
    }
}
