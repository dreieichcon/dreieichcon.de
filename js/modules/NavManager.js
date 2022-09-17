import { ApiConnector } from "./ApiConnector.js";
import { NavCollection } from "./classes/Nav.js";

export class NavManager {
    constructor() {

    }

    static getNav() {
        return new Promise((resolve, reject) => {
            ApiConnector.getNav()
                .then(result => resolve(this.parseNavigationChildren(result)))
                .catch(error => reject(error))
        })
    }

    static createNav(data) {
        return new NavCollection(data);
    }

    static traverse(topLevel, parent, child) {

        if (child.childs != undefined) {
            child.childs.forEach(c => this.traverse(topLevel, child, c));
        }

        parent.childs.forEach((item, index) => {
            topLevel.childs.push(item)
            parent.childs.splice(index, 1)
        })
    }

    static parseNavigationChildren(data) {

        data.forEach(topLevel => {
            if (topLevel.childs != undefined) {
                topLevel.childs.forEach(child => {
                    this.traverse(topLevel, topLevel, child)
                })
            }
        })

        return data;
    }

}