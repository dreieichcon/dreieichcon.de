class Footer extends ContentItem {
    constructor() {
        super();
    }
}

class FooterLink extends ContentItem {
    constructor() {
        super();
    }
}


class Globals extends ContentItem {
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

                this.footer.content[num][identifier] = this.parseData(value);
            }

            if (key.startsWith("footerLink.")) {
                var num = key.split(".")[1]
                var identifier = key.split(".")[2]

                if (this.footer.links[num] === undefined) {
                    this.footer.links[num] = new FooterLink();
                }

                this.footer.links[num][identifier] = this.parseData(value);
            }


        })

        console.log(this)
    }
}