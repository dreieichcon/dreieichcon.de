class ContentItem {
    constructor() {

    }

    getTitle(language) {
        if (language.value === "de") {
            if (this.title_de === undefined) throw "title_de is undefined"
            return this.title_de;
        }
        if (this.title_en === undefined) throw "title_en is undefined"
        return this.title_en;
    }

    getSubtitle(language) {
        if (language.value === "de") {
            if (this.subtitle_de === undefined) throw "subtitle_de is undefined"
            return this.subtitle_de;
        }
        if (this.subtitle_en === undefined) throw "subtitle_en is undefined"
        return this.subtitle_en;
    }

    getImage(language) {
        if (language.value === "de") {
            if (this.image_de === undefined) throw "image_de is undefined"
            if (this.image_de === null) return false;
            return this.base + this.image_de;
        }
        if (this.image_en === undefined) throw "image_en is undefined"
        if (this.image_en === null) return false;
        return this.base + this.image_en;
    }

    getAlt(language) {
        if (language.value === "de") {
            if (this.image_alt_de === undefined) throw "image_alt_de is undefined"
            return this.image_alt_de;
        }
        if (this.image_alt_en === undefined) throw "image_alt_en is undefined"
        return this.image_alt_en;
    }

    getContent(language) {
        if (language.value === "de") {
            if (this.content_de === undefined) throw "content_de is undefined"
            return this.content_de;
        }
        if (this.content_en === undefined) throw "content_en is undefined"
        return this.content_en
    }

    getShortBio(language) {
        if (language.value === "de") {
            if (this.short_de === undefined) throw "short_de is undefined"
            return this.short_de;
        }
        if (this.short_en === undefined) throw "short_en is undefined"
        return this.short_en;
    }

    parseData(input) {
        var ret = input;
        ret = ret.replaceAll("\n", "<br/>")
        ret = ret.replaceAll("&amp;", "&")
        return ret;
    }
}