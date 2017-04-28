(function ($) {
    $.fn.courseToWizard = function (options) {
        options = $.extend({
            submitButton: ""
        }, options);

        var element = this;
        var steps = $(element).find("fieldset");
        var count = steps.size();
        /*count等於有幾個fieldest*/
        var num = 0;
        var submmitButtonName = "#" + options.submitButton;


        // $(submmitButtonName).hide();

        // 2
        $(element).before("<ul id='steps'></ul>");

        steps.each(function (i) {
            $(this).wrap("<div id='step" + i + "'></div>");
            $(this).append("<p id='step" + i + "commands'></p>");

            // 2
            var name = $(this).find("legend").html();
            $("#steps").append("<li id='stepDesc" + i + "'>Step " + (i + 1) + "<span>" + name + "</span></li>");
            $("#stepDesc" + i).hide();
            if (i == 0) {
                createNextButton(i);
                selectStep(i);
            }
            else {
                $("#step" + i).hide();
                createPrevButton(i);
            }
        });
        $("#create_church").click(function () {/*檢查是否勾選CheckBox*/

            if ($("#create_church").prop("checked") == true) {/*如果有勾選*/
                $("#step0Next").show();
                $("#stepDesc0").show();
                $("#stepDesc1").show();
                $(submmitButtonName).hide();
            } else {
                $("#step0Next").hide();
                $("#stepDesc0").hide();
                $("#stepDesc1").hide();
                $(submmitButtonName).show();
            }
        });
        function createPrevButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Prev' class='prev'>< 上一步</a>");
            $("#" + stepName + "Prev").bind("click", function (e) {
                $(submmitButtonName).hide();
                if ($("#create_church").prop("checked") == true) {
                    $("#step" + (i - 1)).show();
                    $("#step" + i).hide();
                    selectStep(i - 1);
                }
            });
        }

        function createNextButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Next' class='next'>下一步 ></a>");
            $("#" + stepName + "Next").bind("click", function (e) {
                $(submmitButtonName).show();
                if ($("#create_church").prop("checked") == true) {
                    $("#step" + (i + 1)).show();
                    $("#step" + i).hide();
                    selectStep(i + 1);
                }
            });
        }


        function selectStep(i) {
            $("#steps li").removeClass("current");
            $("#stepDesc" + i).addClass("current");
        }

    }
})(jQuery);

$(function () {
    $('#SignupForm').courseToWizard({
        submitButton: 'SaveAccount'
    });

});
/**
 * Created by User on 2017/1/9.
 */
