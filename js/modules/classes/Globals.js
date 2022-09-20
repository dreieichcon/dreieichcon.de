import { ContentItem } from "./ContentItem.js"
import { Footer, FooterLink } from "./Footer.js"

export class Globals extends ContentItem {
    constructor() {
        super();

        this.footer = {
            content: [],
            links: []
        }

        this.header = {}
    }

    setData(data) {
        Object.entries(data).forEach(kv => {

            var key = kv[0];
            var value = kv[1];

            if (key.startsWith("footer.")) {
                var num = key.split(".")[1]
                var identifier = key.split(".")[2]

                if (this.footer.content[num] === undefined) {
                    this.footer.content[num] = new Footer()
                }

                this.footer.content[num][identifier] = value;
            }

            else if (key.startsWith("footerLink.")) {
                var num = key.split(".")[1]
                var identifier = key.split(".")[2]

                if (this.footer.links[num] === undefined) {
                    this.footer.links[num] = new FooterLink();
                }

                this.footer.links[num][identifier] = value;
            }

            else if (key.startsWith("tickets_shoplink")) {
                this.header["shoplink"] = value;
            }

            else if (key.startsWith("event")) {
                var identifier = key.split(".")[1]

                this[identifier] = value;
            }

            else {
                console.log(key + " " + value)
            }
        })
    }
}