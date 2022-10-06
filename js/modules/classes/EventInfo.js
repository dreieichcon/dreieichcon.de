import { ContentItem } from "./ContentItem.js";

export class EventInfo extends ContentItem {
    constructor(data) {
        super();

        this.type = "event_info"
        this.set("title_de", "Programmpunkt")
        this.set("title_en", "Program Info:")
        this.set("event_title_de", data.event_title_de)
        this.set("event_title_en", data.event_title_en)
        this.set("image_de", data.event_image_href_de)
        this.set("image_en", data.event_image_href_en)
        this.set("event_subtitle_de", data.event_description_short_de)
        this.set("event_subtitle_en", data.event_description_short_en)
        this.set("event_description_de", data.event_description_de)
        this.set("event_description_en", data.event_description_en)

        this.set("event_type_title_de", "Typ:")
        this.set("event_type_title_en", "Type:")
        this.set("event_type_de", data.event_type_de)
        this.set("event_type_en", data.event_type_en)

        this.set("event_start_title_de", "Beginn:")
        this.set("event_start_title_en", "Start:")
        this.set("event_start_de", this.formatTimestamp(data.event_start_ts, "de"))
        this.set("event_start_en", this.formatTimestamp(data.event_start_ts, "en"))

        this.set("event_duration_title_de", "Dauer:")
        this.set("event_duration_title_en", "Duration:")
        this.set("event_duration_de", this.formatDuration(data.event_start_ts, data.event_end_ts, "de"))
        this.set("event_duration_en", this.formatDuration(data.event_start_ts, data.event_end_ts, "en"))

        this.set("event_timeuntil_title_de", "Startet:")
        this.set("event_timeuntil_title_en", "Starts in:")
        this.set("event_timeuntil_de", this.formatTimeUntil(data.event_start_ts, data.event_end_ts, "de"))
        this.set("event_timeuntil_en", this.formatTimeUntil(data.event_start_ts, data.event_end_ts, "en"))

        this.base = "/upload/event/img/"
    }
}

