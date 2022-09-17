import { TableCollection, TableRow, TableKvP } from "./Table.js";

export class ProgramItem extends TableRow {
    constructor(data) {
        super();

        window.debug(data)
        this.addKvp("Name", data.program_title_de, "de", "title");
        this.addKvp("Name", data.program_title_en, "en", "title");
        this.addKvp("Beschreibung", data.program_description_de, "de", "description")
        this.addKvp("Description", data.program_description_en, "en", "description")
        this.addKvp("Ort", data.location_name_de, "de", "location");
        this.addKvp("Location", data.location_name_en, "en", "location");
        this.addKvp("Beginn", this.formatTimestamp(data.program_start_ts, "de"), "de", "starttime")
        this.addKvp("Start", this.formatTimestamp(data.program_start_ts, "en"), "en", "starttime")
        this.addKvp("Zeit bis Start", this.formatTimeUntil(data.program_start_ts, "de"), "de", "timeuntil")
        this.addKvp("Time until Start", this.formatTimeUntil(data.program_start_ts, "en"), "en", "timeuntil")
    }
}

export class Program extends TableCollection {
    constructor(data) {
        super();

        this.type = "program"
        this.title_de = "Programm"
        this.title_en = "Program"

        this.filtered = []

        data.forEach(dataPoint => {
            this.rows.push(new ProgramItem(dataPoint))
        })

        this.generateHeadings("de");
    }
}