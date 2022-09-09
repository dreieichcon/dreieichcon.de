class Page404 {
    constructor(error) {
        this.type = "blog"
        this.posts = [
            new BlogPost({
                page_blog_title_de: "Wir konnten leider nichts finden :(",
                page_blog_content_de: error,
            })
        ]
    }

    getTitle() {
        return "oopsie"
    }
}

class ContentLoader {

    static parseContent(data) {

        if (data.page_type === "blog") {
            return new Blog(data);
        }

        if (data.page_type === "galery") {
            return new Gallery(data);
        }

        if (data.page_type === "bio") {
            console.log(data)
            return new Biography(data)
        }

        return new Page404();
    }

    static getError(error) {
        return new Page404(error);
    }

    static getNav(data) {
        return new NavCollection(data)
    }
}