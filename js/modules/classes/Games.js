import { ContentItem } from "./ContentItem.js";
import { TableCollection, TableRow, TableKvP } from "./Table.js";

export class GameItem extends TableRow {
    constructor(data) {
        super();

        var start_ts = data.start_timestamp;
        var end_ts = start_ts + parseInt(data.duration) * 60;
        var user = data.game_master.name;
        var alias = data.alias_game_master;
        var max = data.player_max;
        var current = data.player.length;

        this.start = start_ts

        this.addKvp("Beginn", this.formatTimestampTime(start_ts, "de"), "de", "starttime");
        this.addKvp("System", this.parseSystem(data), "de", "system");
        this.addKvp("Typ", this.parseTags(data.label), "de", "tags");
        this.addKvp("Rundenname", data.title, "de", "title");
        this.addKvp("Spielleitende", this.parseGameMaster(user, alias), "de", "leader")
        this.addKvp("Spielende", this.calculateSlots(max, current), "de", "players")
        this.addKvp("Dauer", (data.duration / 60) + " Stunden", "de", "duration")
        this.addKvp("Zeit bis Start", this.formatTimeUntil(start_ts, end_ts, "de"), "de", "timeuntil");

        this.action = "external"
        this.href = "https://conservices.de/game/" + data.id;
    }

    parseSystem(data){
        if (data.system_version !== null) return data.system + " " + data.system_version;
        return data.system;
    }

    calculateSlots(max, current) {
        var full = ""

        if (max === current) full = " (VOLL)";

        return current + "/" + max + full;
    }

    parseGameMaster(user, alias) {
        if (alias === undefined || alias === null) return user;
        return alias;
    }

    parseTags(tags) {
        var tagNames = []

        Object.values(tags).forEach(x => {
            tagNames.push(x.name)
        })

        return tagNames.join(", ");
    }
}
export class GameGroup extends TableCollection {
    constructor(data, title) {
        super();

        this.title_de = title;

        data.forEach(dataPoint => {
            this.rows.push(new GameItem(dataPoint))
        })

        this.rows.sort((a, b) => (a.start > b.start) ? 1 : -1)

        this.generateHeadings("de");
    }
}

export class GameOverview extends ContentItem {
    constructor(data) {
        super();
        this.type = "games"
        this.title_de = "Spielrunden"
        this.title_en = "Game Rounds"

        this.groups = [];
        var temp = {
            "Montag": [],
            "Dienstag": [],
            "Mittwoch": [],
            "Donnerstag": [],
            "Freitag": [],
            "Samstag": [],
            "Sonntag": []
        }

        Object.values(data).forEach(dataPoint => {
            var date = this.checkDate(dataPoint);
            temp[date].push(dataPoint);
        });

        Object.entries(temp).forEach(x => {
            if (x[1].length > 0) {
                this.groups.push(new GameGroup(x[1], x[0]));
            }
        });
    }

    checkDate(data) {
        var timestamp = data.start_timestamp * 1000

        var date = new Date(timestamp);

        var day = date.getDay();

        switch (day) {
            case 0: return "Sonntag";
            case 1: return "Montag";
            case 2: return "Dienstag";
            case 3: return "Mittwoch";
            case 4: return "Donnerstag";
            case 5: return "Freitag";
            case 6: return "Samstag";
        }
    }
}