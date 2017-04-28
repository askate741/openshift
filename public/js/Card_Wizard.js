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
        $("#Card_hide").hide();
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
            else {
                $("#step" + i).hide();
                createPrevButton(i);
            }
        });
        $("#step0Next").hide();
        $("#credit_card_yes").click(function () {/*檢查是否勾選CheckBox*/

            if ($("#credit_card_yes").prop("checked") == true) {/*如果有勾選*/
                $("#step0Next").show();
                $(submmitButtonName).hide();
            } else if($("#credit_card_no").prop("checked") == true) {
                $("#step0Next").hide();
                $(submmitButtonName).show();
            }
        });
        $("#credit_card_no").click(function () {/*檢查是否勾選CheckBox*/

            if ($("#credit_card_yes").prop("checked") == true) {/*如果有勾選*/
                $("#step0Next").show();
                $(submmitButtonName).hide();
            } else if($("#credit_card_no").prop("checked") == true) {
                $("#step0Next").hide();
                $(submmitButtonName).show();
            }
        });
        function createPrevButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Prev' class='prev'>< 上一步</a>");
            $("#" + stepName + "Prev").bind("click", function (e) {
                $(submmitButtonName).hide();
                if ($("#credit_card_yes").prop("checked") == true) {
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
                if ($("#credit_card_yes").prop("checked") == true) {
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
