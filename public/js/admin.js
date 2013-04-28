(function (window, document, $, baseUrl, userId, undefined) {
    "use strict";

    var createMilestone = function (name, desc, startDate, endDate, parent, userId, type) {
        $.ajax(baseUrl + "", {"type": "post"});
    };

    var enrollStudent = function (moduleId, email) {
        $.ajax(baseUrl + "", {"type": "post"});
    };

    $("#createMilestone").on("click", function () {
        createMilestone($("#milestoneName").val(), $("#milestoneDesc").val(), $("#milestoneStartDate").val(), $("#milestoneEndDate").val(), $("#milestoneParent").val(). userId, $("#milestoneType").val());
    });

    $("#enrollStudent").on("click", function () {
        enrollStudent($("#enrollModule").val(), $("#enrollStudent").val());
    });

}(this, this.window, this.jQuery, BASE_URL, USER_ID));