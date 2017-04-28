(function ($) {
    $.fn.account_Wizard = function (options) {
        options = $.extend({
            submitButton: ""
        }, options);

        var element = this;
        var steps = $(element).find("fieldset");
        var count = steps.size();
        /*count等於有幾個fieldest*/
        var num = 0;
        var submmitButtonName = "#" + options.submitButton;


        $(submmitButtonName).hide();
        // 2
        $(element).before("<ul id='steps'></ul>");

        steps.each(function (i) {
            $(this).wrap("<div id='step" + i + "'></div>");
            $(this).append("<p id='step" + i + "commands'></p>");

            // 2
            var name = $(this).find("legend").html();
            $("#steps").append("<li id='stepDesc" + i + "'>Step " + (i + 1) + "<span>" + name + "</span></li>");

            if (i == 0) {
                createNextButton(i);
                selectStep(i);
            }
            else if (i == count - 1) {
                $("#step" + i).hide();
                createPrevButton(i);
            }
            else {
                $("#step" + i).hide();
                createPrevButton(i);
                createNextButton(i);
            }
        });

        function createPrevButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Prev' class='prev'>< 上一步</a>");
            $("#" + stepName + "Prev").bind("click", function (e) {
            });
        }

        function createNextButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Next' class='next'>下一步 ></a>");
            $("#" + stepName + "Next").bind("click", function (e) {
            });


        }

        function selectStep(i) {
            $("#steps li").removeClass("current");
            $("#stepDesc" + i).addClass("current");
        }

    }
})(jQuery);

$(function () {
    $('#SignupForm').account_Wizard({
        submitButton: 'SaveAccount'
    });

});
/**
 * Created by asd755045 on 2016/12/6.
 */






