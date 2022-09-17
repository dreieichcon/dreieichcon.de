export class ApiConnector {
    constructor() {

    }

    static buildLink(endpoint) {
        var href = window.location.origin;
        return href + endpoint;
    }

    static get(endpoint) {
        return new Promise((resolve, reject) => axios
            .get(this.buildLink(endpoint))
            .then(
                result => {
                    resolve(result.data)
                }
            ).catch(error => {
                console.log("Error in get to " + endpoint);
                console.log(error);
                reject(error)
            }));
    }

    static post(endpoint, data) {
        return new Promise((resolve, reject) => axios
            .post(this.buildLink(endpoint), data)
            .then(
                result => {
                    resolve(result.data)
                }
            ).catch(error => {
                console.log("Error in POST to " + endpoint);
                console.log(error);
                reject(error)
            }))
    }

    static getPage(id) {
        return this.get("/api/page.php?page_id=" + id)
    }

    static getProgram() {
        return this.get("/api/program.php");
    }

    static getNav() {
        return this.get("/api/navigation.php");
    }

    static getGlobals() {
        return this.get("/api/globals.php")
    }

    static getSocials() {
        return this.get("/api/socials.php")
    }

    static postContact(data) {
        return this.post("/api/contact.php", data)
    }
}