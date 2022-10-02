import { TableCollection, TableRow, TableKvP } from "./Table.js";

export class ProgramItem extends TableRow {
    constructor(data) {
        super();

        window.debug(data)
        this.addKvp("Name", data.event_title_de, "de", "title");
        this.addKvp("Name", data.event_title_en, "en", "title");

        this.addKvp("Beschreibung", data.event_description_de, "de", "description");
        this.addKvp("Description", data.event_description_en, "en", "description");

        this.addKvp("Ort", data.location_name_de, "de", "location");
        this.addKvp("Location", data.location_name_en, "en", "location");

        this.addKvp("Typ", data.event_type_de, "de", "type");
        this.addKvp("Type", data.event_type_en, "en", "type");

        this.addKvp("Beginn", this.formatTimestamp(data.event_start_ts, "de"), "de", "starttime");
        this.addKvp("Start", this.formatTimestamp(data.event_start_ts, "en"), "en", "starttime");

        this.addKvp("Dauer", this.formatDuration(data.event_start_ts, data.event_end_ts, "de"), "de", "duration");
        this.addKvp("Duration", this.formatDuration(data.event_start_ts, data.event_end_ts, "en"), "en", "duration");

        this.addKvp("Zeit bis Start", this.formatTimeUntil(data.event_start_ts, data.event_end_ts, "de"), "de", "timeuntil");
        this.addKvp("Time until Start", this.formatTimeUntil(data.event_start_ts, data.event_end_ts, "en"), "en", "timeuntil");

        this.parseImage(data);

        this.isRunning = this.isCurrently(data.event_start_ts, data.event_end_ts);
    }

    parseImage(data) {

        if (data.event_image_href_de === null)
            this.set("iImage_de", false);

        else
            this.set("iImage_de", new ImageItem(
                data.event_image_href_de,
                data.event_image_alt_de,
                data.event_image_copy_de
            ))

        if (data.event_image_href_en == null)
            this.set("iImage_en", false);

        else
            this.set("iImage_en", new ImageItem(
                data.event_image_href_en,
                data.event_image_alt_en,
                data.event_image_copy_en
            ))
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