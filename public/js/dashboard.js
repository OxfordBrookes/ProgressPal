// Defaults. These should be changed before responding with this JavaScript.
var BASE_URL = "";
var USER_ID = -1;

// Wrapped in IIFE to improve scope traversal.
(function (document, $, baseUrl, userId) {
    "use strict";
    var progress;

    // Calculates and updates the progress bar.
    var calculateProgress = function (increment) {
        var userProgress = parseInt(((progress.user / progress.total) * 100), 10);
        var avgProgress = ((progress.avg / progress.total) * 100) - userProgress;

        avgProgress = parseInt(((avgProgress > 0) ? avgProgress : 0), 10);

        // "White flash" fix (for chrome).
        if (increment === 1) {
            $(".bar.bar-danger").width((100 - userProgress - avgProgress) + "%");
            $(".bar.bar-warning").width(avgProgress + "%");
            $(".bar.bar-success").width(userProgress + "%");
        } else {
            $(".bar.bar-success").width(userProgress + "%");
            $(".bar.bar-warning").width(avgProgress + "%");
            $(".bar.bar-danger").width((100 - userProgress - avgProgress) + "%");
        }

    };

    // "No-Slash" fix.
    baseUrl = (baseUrl[baseUrl.length - 1] === "/") ? baseUrl : baseUrl + "dashboard/";

    // Load progress bar data.
    $.getJSON(baseUrl + "getProgress/" + userId, function (data) {
        progress = data;
        calculateProgress();
    });

    // Load milestones.
    $.getJSON(baseUrl + "getData/" + userId, function (milestones) {
        // Displays all milestones.
        var showMilestones = function (milestones) {
            var i, milestone, circleColour, children;
            var len = milestones.length;
            var s = "";

            for (i = 0; i < len; i += 1) {
                milestone = milestones[i];
                circleColour = (milestone.children) ? "grey" : ((milestone.complete === true) ? "green" : "red");
                children = (milestone.children) ? "<div class='milestones' style='display:none'>\n" + showMilestones(milestone.children) + "</div>" : "";

                s += "<div id='" + milestone.type + "_" + milestone.id + "' class='milestone'><div class='circle " + circleColour + " pull-left'></div><div class='pull-left'><div class='name'>" + milestone.name + "</div><div class='desc'>" + milestone.desc + "</div></div><div class='clearfix'></div>" + children + "</div>";
            }

            return s;
        };

        // Marks a milestone as complete/incomplete.
        var progressChange = function (type, id, increment) {
            $.post("", {
                "func": "changeComplete",
                "userId": userId,
                "type": type,
                "id": id,
                "completed": increment
            });
            progress.user += increment;
            calculateProgress(increment);
        };

        // Toggles (show/hide) the children of a milestone.
        var toggle = function () {
            var $this = $(this);
            var parent = $this.hasClass("circle") ? $this.parent() : $this.parent().parent();
            var id = parent.attr("id").replace("module_", "").replace("assignment_", "").replace("milestone_", "");
            var type = parent.attr("id").split("_")[0];
            var $circle = $this.hasClass("circle") ? $this : $($this.parent().parent().children(".circle")[0]);

            if ($circle.hasClass("green")) {
                $circle.removeClass("green");
                $circle.addClass("red");
                progressChange(type, id, -1);
            } else if ($circle.hasClass("red")) {
                $circle.removeClass("red");
                $circle.addClass("green");
                progressChange(type, id, 1);
            } else {
                $(parent.children(".milestones")).toggle("fast");
            }
        };

        $("#milestones").append(showMilestones(milestones));
        $(".circle").on("click", toggle);
        $(".name").on("click", toggle);
        $(".desc").on("click", toggle);
    });

    // Toggle all shortcut.
    $(document).jkey('ctrl+space', function () {
        var milestones = $(".milestones");
        var action = $(milestones[0]).children().children(".milestones").is(":visible") ? "hide" : "show";
        var children = $(milestones.slice(1));

        children[action]((action === "hide") ? "slow" : null);
    });
}(this.document, jQuery, BASE_URL, USER_ID));
