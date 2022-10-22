import { ContentItem } from "./ContentItem.js";
import { TableCollection, TableRow, TableKvP } from "./Table.js";

export class GameItem extends TableRow {
    constructor(data) {
        super();

        var start_ts = data.con_convention_rpg_start_ts;
        var end_ts = start_ts + parseInt(data.con_convention_rpg_duration) * 60 * 60;
        var user = data.con_user_full;
        var alias = data.con_convention_rpg_alias_master;
        var max = data.con_convention_rpg_player_max;
        var current = data.con_convention_rpg_player_joined;

        window.debug(data)

        this.addKvp("Beginn", this.formatTimestampTime(start_ts, "de"), "de", "starttime");

        this.addKvp("System", data.con_convention_rpg_system, "de", "system");

        this.addKvp("Typ", this.parseTags(data.con_convention_rpg_tags), "de", "tags");

        this.addKvp("Rundenname", data.con_convention_rpg_title, "de", "title");

        this.addKvp("Spielleitende", this.parseGameMaster(user, alias), "de", "leader")

        this.addKvp("Spielende", this.calculateSlots(max, current), "de", "players")

        this.addKvp("Dauer", data.con_convention_rpg_duration + " Stunden", "de", "duration")

        this.addKvp("Zeit bis Start", this.formatTimeUntil(start_ts, end_ts, "de"), "de", "timeuntil");

        this.action = "external"
        this.href = "https://conservices.de/index.php?page=game_details&game_secret=" + data.con_convention_rpg_secret + "&from_external";
    }

    calculateSlots(max, current) {
        var full = ""

        if (max == current) full = " (VOLL)";

        return current + "/" + max + full;
    }

    parseGameMaster(user, alias) {
        if (alias === undefined || alias === null) return user;
        return alias;
    }

    parseTags(tags) {
        var tagNames = []

        tags.forEach(x => {
            tagNames.push(x.con_convention_rpg_tag_name)
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

        data.forEach(dataPoint => {

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
        var timestamp = data.con_convention_rpg_start_ts * 1000

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