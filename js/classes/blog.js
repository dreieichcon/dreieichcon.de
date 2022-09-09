
class BlogPost {
    constructor(data) {
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
    }


    getTitle(language) {
        if (language === "de") return this.title_de;
        return this.title_en;
    }


    getSubtitle(language) {
        if (language === "de") return this.subtitle_de;
        return this.subtitle_en;
    }

    getImage(language) {
        if (language === "de") {
            if (this.image_de === null) return false;
            return "/upload/blog/img/" + this.image_de
        }

        if (this.image_en === null || this.image_en === "") return false;
        return "/upload/blog/img/" + this.image_en
    }

    getAlt(language) {
        if (language === "de") return this.image_alt_de;
        return this.image_alt_en;
    }

    getContent(language) {
        if (language === "de") return this.content_de;
        return this.content_en;
    }
}

class Blog {

    constructor(data) {

        this.type = "blog"
        this.posts = [];
        this.title_de = data.page_title_de
        this.title_en = data.page_title_en

        if (data.page_content.blog === undefined) return;
        data.page_content.blog.forEach(x => this.posts.push(new BlogPost(x)))
    }

    getTitle(language) {
        if (language === "de") return this.title_de;
        return this.title_en;
    }
}
