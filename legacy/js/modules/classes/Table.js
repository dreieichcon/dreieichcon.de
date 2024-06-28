import { ContentItem } from "./ContentItem.js";

export class TableKvP extends ContentItem {
    constructor(heading, data, language, type) {
        super();

        this.heading = heading
        this.data = data
        this.language = language
        this.type = type
    }
}

export class TableRow extends ContentItem {
    constructor() {
        super();

        this.data = []
    }

    getTableRow(language) {
        var x = []
        this.data.forEach(data => {
            if (data.language === language.value) {
                x.push(data);
            }
        })
        return x;
    }

    addKvp(heading, data, language, type) {
        this.data.push(new TableKvP(heading, data, language, type))
    }
}

export class TableCollection extends ContentItem {
    constructor() {
        super();

        this.rows = [];
        this.headings = [];
    }

    generateHeadings(language) {
        var row = this.rows[0];
        if (this.rows[0] === undefined) return;

        row.data.forEach(x => {
            if (x.language === language) this.headings.push(x.heading)
        })
    }
}