// Defaults. These should be changed before responding with this javascript.
var BASE_URL = "";
var USER_ID = -1;

// Wrapped in IIFE to improve scope traversal.
(function (window, document, $, baseUrlGrr, userId, undefined) {
    "use strict";

    // "No-Slash" fix.
    var baseUrl = (baseUrlGrr[baseUrlGrr.length - 1] === "/") ? baseUrlGrr : baseUrlGrr + "dashboard/";
    
    var progress;

    var calculateProgress = function () {
        var userProgress = (progress.user / progress.total) * 100;
        var avgProgress = ((progress.avg / progress.total) * 100) - userProgress;

        avgProgress = (avgProgress > 0) ? avgProgress : 0;

        $(".bar.bar-success").width(userProgress + "%");
        $(".bar.bar-warning").width(avgProgress + "%");
        $(".bar.bar-danger").width((100 - userProgress - avgProgress) + "%");
    };

    // Load progress bar data.
    $.getJSON(baseUrl + "getProgress/" + userId, function (data) {
        progress = data;
        calculateProgress();
    });

    // Load milestones.
    $.getJSON(baseUrl + "getData/" + userId, function (milestones) {
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
        
        $("#milestones").append(showMilestones(milestones));
        
        var toggle = function () {
            var $milestones;
            var $this = $(this);
            var id = $this.parent().attr("id").replace("module_", "").replace("assignment_", "").replace("milestone_", "");
            var type = $this.parent().attr("id").split("_")[0];
        
            if ($this.hasClass("green")) {
                $this.removeClass("green");
                $this.addClass("red");
                $.ajax(baseUrl + "changeComplete/" + userId + "," + type + "," + id + ",false", {"type": "post"});
                progress.user -= 1;
                calculateProgress();
            } else if ($this.hasClass("red")) {
                $this.removeClass("red");
                $this.addClass("green");
                $.ajax(baseUrl + "changeComplete/" + userId + "," + type + "," + id + ",true", {"type": "post"});
                progress.user += 1;
                calculateProgress();
            } else {
                $($this.parent().children(".milestones")).toggle("fast");
            }
        };
        
        $(".circle").on("click", toggle);
        $(".name").on("click", toggle);
        $(".desc").on("click", toggle);
    });

}(this, this.window, jQuery, BASE_URL, USER_ID));
