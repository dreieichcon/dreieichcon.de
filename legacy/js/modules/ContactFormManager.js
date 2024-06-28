import { ApiConnector } from "./ApiConnector.js"
import { ContentItem } from "./classes/ContentItem.js";

export class ContactFormManager {
    constructor() {

    }

    static send(data) {
        return new Promise((resolve, reject) => {
            ApiConnector.postContact(data).then(r =>
                resolve(this.parseResult(r))
            ).catch(r => reject(this.parseResult(r)))
        })
    }

    static parseResult(r) {
        return new ContactFormStatus(r);
    }

}

class ContactFormStatus extends ContentItem {
    constructor(data) {
        super();

        if (data.result != undefined) {
            if (data.result === "ok") {
                this.status_de = "Anfrage erhalten, vielen Dank!"
                this.status_en = "Request received, Thank you!"
            }

            if (data.result === "nok") {
                this.status_de = "Bei deiner Anfrage ist leider ein Fehler aufgetreten."
                this.status_en = "Your request was unsuccessful."
            }
        }

    }
}