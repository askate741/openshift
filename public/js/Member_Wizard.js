(function ($) {
    $.fn.formToWizard = function (options) {
        options = $.extend({
            submitButton: ""
        }, options);

        let element = this;
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
            $("#step0Next").hide();
            // 2
            var name = $(this).find("legend").html();
            $("#steps").append("<li id='stepDesc" + i + "'>Step " + (i + 1) + "<span>" + name + "</span></li>");
            $("#stepDesc" + i).hide();
            if (i === 0) {
                createNextButton(i);
                selectStep(i);
            }
            else if (i === count - 1) {
                $("#step" + i).hide();
                createPrevButton(i);
            }
            else {
                $("#step" + i).hide();
                createPrevButton(i);
                createNextButton(i);
            }
        });
        $("#create_church").click(function () {
            changeSteps();
        });
        $("#credit_card_yes").click(function () {
            changeSteps();
        });
        $("#credit_card_no").click(function () {
            changeSteps();
        });
        function createPrevButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Prev' class='prev'>< 上一步</a>");
            $("#" + stepName + "Prev").bind("click", function (e) {
                if ($("#credit_card_yes").prop("checked") === true && $("#create_church").prop("checked") === true) {
                    $("#step" + (i - 1)).show();
                    $("#step" + i).hide();
                    selectStep(i - 1);
                    if (i === 2) {
                        $(submmitButtonName).hide();
                    }
                } else if ($("#create_church").prop("checked") === true) {
                    $("#step" + (i - 1)).show();
                    $("#step" + i).hide();
                    selectStep(i - 1);
                }
                else if ($("#credit_card_yes").prop("checked") === true) {
                    $("#step" + i).hide();
                    $("#step" + (i - 1)).hide();
                    $("#step" + (i - 2)).show();
                    selectStep(i - 2);
                }
                else {

                }
            });
        }

        function createNextButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Next' class='next'>下一步 ></a>");
            $("#create_church").click(function () {
                clickButton(i);
            });
            $("#credit_card_yes").click(function () {
                clickButton(i);
            });
            $("#credit_card_no").click(function () {
                clickButton(i);
            });
            $("#" + stepName + "Next").bind("click", function (e) {
                $(submmitButtonName).show();
                if ($("#credit_card_yes").prop("checked") === true && $("#create_church").prop("checked") === true) {
                    $("#step" + (i + 1)).show();
                    $("#step" + i).hide();
                    selectStep(i + 1);
                    if (i === 0) {
                        $(submmitButtonName).hide();
                    }
                } else if ($("#create_church").prop("checked") === true) {
                    $("#step" + (i + 1)).show();
                    $("#step" + i).hide();
                    $("#step" + (i + 1) + "Next").hide();
                    selectStep(i + 1);
                }
                else if ($("#credit_card_yes").prop("checked") === true) {
                    $("#step" + i).hide();
                    $("#step" + (i + 1)).hide();
                    $("#step" + (i + 2)).show();
                    selectStep(i + 2);
                }
                else {

                }

            });


        }

        function clickButton(i) {
            if ($("#create_church").prop("checked") === true || $("#credit_card_yes").prop("checked") === true) {
                $("#step" + i + "Next").show();
                $(submmitButtonName).hide();
            }
            else {
                $("#step" + i + "Next").hide();
                $(submmitButtonName).show();
            }
        }
        function changeSteps() {
            if ($("#credit_card_yes").prop("checked") === true && $("#create_church").prop("checked") === true) {
                $("#stepDesc0").show();
                $("#stepDesc1").show();
                $("#stepDesc2").text("Step 3").append("<span>" + "信用卡資料" + "</span>").show();
            }
            else if ($("#create_church").prop("checked") === true) {
                $("#stepDesc0").show();
                $("#stepDesc1").show();
                $("#stepDesc2").hide();
            }
            else if ($("#credit_card_yes").prop("checked") === true) {
                $("#stepDesc0").show();
                $("#stepDesc1").hide();
                $("#stepDesc2").text("Step 2").append("<span>" + "信用卡資料" + "</span>").show();
            }
            else {
                $("#stepDesc0").hide();
                $("#stepDesc1").hide();
                $("#stepDesc2").text("Step 3").append("<span>" + "信用卡資料" + "</span>").hide();
            }
        }

        function selectStep(i) {
            $("#steps li").removeClass("current");
            $("#stepDesc" + i).addClass("current");

        }

    }
})(jQuery);

$(function () {
    $('#SignupForm').formToWizard({
        submitButton: 'SaveAccount'
    });

});
/**
 * Created by asd755045 on 2016/12/6.
 */

