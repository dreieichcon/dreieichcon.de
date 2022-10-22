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

        this.running_de = "Läuft gerade."
        this.running_en = "Currently running."
        this.over_de = "Bereits vorbei."
        this.over_en = "Already over."
    }

    parseData(input) {
        var ret = input;
        ret = ret.replaceAll("\n", "<br/>")
        ret = ret.replaceAll("\\n", "<br/>")

        const ampGex = /&[amp;]+/g
        const quotGex = /&[quot;]+/g
        const apoGex = /&[apos;]+/g
        const ltGex = /&[lt;]+/g
        const gtGex = /&[gt;]+/g

        ret = ret.replaceAll(ampGex, "&")
        ret = ret.replaceAll(apoGex, "'")
        ret = ret.replaceAll(quotGex, '"')
        ret = ret.replaceAll(ltGex, '<')
        ret = ret.replaceAll(gtGex, '>')

        const boldGex = /(\[b\])([\s\S]+?)(\[\/b\])/g
        ret = ret.replaceAll(boldGex, "<strong>$2</strong>")

        const italicGex = /(\[i\])([\s\S]+?)(\[\/i\])/g
        ret = ret.replaceAll(italicGex, "<em>$2</em>")

        const underlinedGex = /(\[u\])([\s\S]+?)(\[\/u\])/g
        ret = ret.replaceAll(underlinedGex, "<u>$2</u>")

        const linkGex = /(\[)(\S[^\]]{2,})(\])(\()([\S\s]+?)(\))/g
        ret = ret.replaceAll(linkGex, "<a class='textlink' target='_blank' href=$2>$5</a>")

        return ret;
    }

    exists(property, language) {
        var identifier = property
        if (language.value === undefined) identifier += "_" + language;
        else identifier += "_" + language.value;

        var property = this[identifier]

        if (property === undefined) return false;
        if (property === null) return false;

        return true;
    }

    get(property, language) {

        var identifier = property
        if (language.value === undefined) identifier += "_" + language;
        else identifier += "_" + language.value;

        var property = this[identifier]

        if (property === undefined) return identifier + " undefined"
        if (property === null) return null;
        return this.parseData(property);
    }

    set(property, value) {

        if (value === undefined) this[property] = null
        this[property] = value;
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
            return new Intl.DateTimeFormat("de-de", { dateStyle: "short", timeStyle: "short" }).format(date).replaceAll(",", " -")
        else
            return new Intl.DateTimeFormat("en-Gb", { dateStyle: "short", timeStyle: "short" }).format(date).replaceAll(",", " -")
    }

    formatTimestampTime(input, language) {
        var date = new Date(input * 1000);
        if (language == "de")
            return new Intl.DateTimeFormat("de-de", { dateStyle: "short", timeStyle: "short" }).format(date).replaceAll(",", " -").split("-")[1];
        else
            return new Intl.DateTimeFormat("en-Gb", { dateStyle: "short", timeStyle: "short" }).format(date).replaceAll(",", " -").split("-")[1];
    }

    formatTimeUntil(inputStart, inputEnd, language) {

        var startDate = new Date(inputStart * 1000);
        var endDate = new Date(inputEnd * 1000);
        var now = Date.now();

        var isRunning = ((endDate - now) > 0 && (startDate - now) < 0);

        if (isRunning) return this.get("running", language);

        var isOver = ((endDate - now) < 0)

        if (isOver) return this.get("over", language);

        var diffTime = Math.abs(startDate - now);

        if (diffTime < 0) return "";

        var timeInDays = diffTime / (1000 * 60 * 60 * 24)

        if (timeInDays >= 2) return Math.round(timeInDays) + " " + this.get("days", language);

        if (timeInDays >= 1) return Math.round(timeInDays) + " " + this.get("day", language);

        var timeInHours = timeInDays * 24;

        if (timeInHours > 1) return Math.round(timeInHours) + " " + this.get("hours", language);

        var timeInMinutes = timeInHours * 60

        return Math.round(timeInMinutes) + " " + this.get("minutes", language);
    }

    formatDuration(inputStart, inputEnd, language) {
        var startDate = new Date(inputStart * 1000);
        var endDate = new Date(inputEnd * 1000);

        var diffTime = Math.abs(startDate - endDate)

        var timeInDays = diffTime / (1000 * 60 * 60 * 24)

        var timeInHours = timeInDays * 24
        if (timeInHours > 1) return Math.round(timeInHours) + " " + this.get("hours", language);

        var timeInMinutes = timeInHours * 60
        return Math.round(timeInMinutes) + " " + this.get("minutes", language);
    }

    isCurrently(inputStart, inputEnd) {
        var startDate = new Date(inputStart * 1000);
        var endDate = new Date(inputEnd * 1000);
        var now = Date.now();

        var isRunning = ((endDate - now) > 0 && (startDate - now) < 0);
        if (isRunning) return true;
        return false;
    }
}

export class ContentCollection extends ContentItem {
    constructor() {
        super();

        this.collection = []
    }
}