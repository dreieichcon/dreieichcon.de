import { ContentItem } from "./ContentItem.js";

export class Contact extends ContentItem {
    constructor() {
        super();

        this.type = "contact";
        this.title_de = "Kontakt";
        this.title_en = "Contact";
        this.subtitle_de = "Kontaktiere uns!"
        this.subtitle_en = "Get into contact with us!"
        this.name_de = "Name:";
        this.name_en = "Name:";
        this.mail_de = "E-Mail:";
        this.mail_en = "Mail:";
        this.message_de = "Nachricht:";
        this.message_en = "Message:";
        this.button_de = "Absenden";
        this.button_en = "Submit";
    }
}