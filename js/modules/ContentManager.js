import { ApiConnector } from "./ApiConnector.js";
import { Program } from "./classes/Program.js";
import { Contact } from "./classes/Contact.js";
import { Blog } from "./classes/Blog.js";
import { Socials } from "./classes/Socials.js";
import { Gallery } from "./classes/Gallery.js";
import { Bio } from "./classes/Bio.js";
import { Error } from "./classes/Error.js";

export class ContentManager {
    constructor() {

    }

    static getPage(id) {
        switch (id) {
            case "contact":
                return this.loadContactPage();

            case "program":
                return this.loadProgramPage();

            default:
                return this.loadNavigationPage(id)
        }
    }

    static loadNavigationPage(id) {
        return new Promise((resolve, reject) => {
            ApiConnector.getPage(id)
                .then(result => resolve(this.getPageContent(result)))
                .catch(error => reject(this.loadErrorPage(error)))
        })
    }

    static loadContactPage() {
        return new Promise((resolve, reject) => {
            resolve(new Contact())
        })
    }

    static loadErrorPage(err) {
        return new Error(err);
    }

    static getPageContent(data) {
        switch (data.page_type) {
            case "blog":
                return new Blog(data);
            case "galery":
                return new Gallery(data);
            case "bio":
                return new Bio(data);
        }
    }

    static loadProgramPage() {
        return new Promise(
            (resolve, reject) => {
                ApiConnector.getProgram()
                    .then(result => resolve(new Program(result)))
                    .catch(error => reject(this.loadErrorPage(error)))
            })
    }

    static getGlobals() {
        return new Promise((resolve, reject) => {
            ApiConnector.getGlobals()
                .then(result => resolve(result))
                .catch(error => reject(error))
        })
    }

    static getSocials() {
        return new Promise((resolve, reject) => {
            ApiConnector.getSocials()
                .then(data => resolve(new Socials(data)))
        })
    }
}