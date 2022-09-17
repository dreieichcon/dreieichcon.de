export class ContentItem {
    constructor() {
        this.day_de = "Tag"
        this.day_en = "Day"
        this.days_de = "Tage"
        this.days_en = "Days"
        this.hours_de = "Stunden"
        this.hours_en = "Hours"
        this.minutes_de = "Minuten"
        this.minutes_en = "Minutes"
    }

    parseData(input) {
        var ret = input;
        ret = ret.replaceAll("\n", "<br/>")
        ret = ret.replaceAll("\\n", "<br/>")
        ret = ret.replaceAll("&amp;", "&")
        return ret;
    }

    get(property, language) {

        var identifier = property
        if (language.value === undefined) identifier += "_" + language;
        else identifier += "_" + language.value;

        var property = this[identifier]

        if (property === undefined || property === null) return identifier + " undefined"
        return this.parseData(property);
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

    formatTimestamp(input, language) {
        var date = new Date(input * 1000);
        if (language == "de")
            return new Intl.DateTimeFormat("de-de", { dateStyle: "short", timeStyle: "short" }).format(date).replaceAll(",", "-")
        else
            return new Intl.DateTimeFormat("en-Gb", { dateStyle: "short", timeStyle: "short" }).format(date).replaceAll(",", "-")
    }

    formatTimeUntil(input, language) {
        var date = new Date(input * 1000);
        var now = Date.now()

        var diffTime = Math.abs(date - now);

        if (diffTime < 0) return "";

        var timeInDays = diffTime / (1000 * 60 * 60 * 24)

        if (timeInDays >= 2) return Math.round(timeInDays) + " " + this.get("days", language);

        if (timeInDays >= 1) return Math.round(timeInDays) + " " + this.get("day", language);

        var timeInHours = timeInDays * 24;

        if (timeInHours > 1) return Math.round(timeInHours) + " " + this.get("hours", language);

        var timeInMinutes = timeInHours * 60

        return Math.round(timeInMinutes) + " " + this.get("minutes", language);

    }
}

export class ContentCollection extends ContentItem {
    constructor() {
        super();

        this.collection = []
    }
}