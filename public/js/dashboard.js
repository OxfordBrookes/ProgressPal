(function (window, document, $, undefined) {
    "use strict";

    var baseUrl = "dashboard/"
    var userId = 1;

    // Load progress bar data.
    $.getJSON(baseUrl + "getProgress/" + userId, function (progress) {
        var userProgress = (progress.user / progress.total) * 100);
        var avgProgress = ((progress.avg / progress.total) * 100) - userProgress;

        avgProgress = (avgProgress > 0) ? avgProgress : 0;

        $(".bar.bar-success").width(userProgress + "%");
        $(".bar.bar-success").width(avgProgress + "%");
        $(".bar.bar-success").width((100 - userProgress - avgProgress) + "%");
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

        $(".circle").on("click", function () {
            var $milestones;
            var $this = $(this);
            var id = $this.parent().attr("id").replace("module_").replace("assignment_").replace("milestone_");
            var type = $this.parent().attr("id").split("_")[0];

            if ($this.hasClass("green")) {
                $this.removeClass("green");
                $this.addClass("red");
                $.ajax(baseUrl + "changeComplete/" + userId + "/" + type + "/" + split + "/false", {"type": "post"});
            } else if ($this.hasClass("red")) {
                $this.removeClass("red");
                $this.addClass("green");
                $.ajax(baseUrl + "changeComplete/" + userId + "/" + type + "/" + split + "/true", {"type": "post"});
            } else {
                $milestones = $($this.find(".milestones")[0]);

                if ($milestones.css("display") === "none") {
                    $milestones.css("display", "block");
                } else {
                    $milestones.css("display", "none");
                }
            }
        });
    });

}(this, this.window, this.jQuery));