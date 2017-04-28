(function ($) {
    $.fn.course_registrationsToWizard = function (options) {
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

                if ($("#create_member_no").prop("checked") == true) {
                    alert("會員");
                    $("#step0").show();
                    $("#step1").hide();
                    $("#steps li").removeClass("current");
                    $("#stepDesc0").addClass("current");
                    if ($("#credit_card_yes").prop("checked") == true && $("#create_church").prop("checked") == true) {
                        alert("兩個");
                        num = 1;
                        $("#step0").hide();
                        $("#step1").hide();
                        $("#" + stepName).hide();
                        $("#step" + (i - num)).show();
                        $(submmitButtonName).hide();
                        selectStep(i - num);
                    } else if ($("#create_church").prop("checked") == true) {
                        alert("教會");
                        num = 3;
                        $("#step0").hide();
                        $("#step1").show();
                        $("#step2").hide();
                        $(submmitButtonName).hide();
                        $("#steps li").removeClass("current");
                        $("#stepDesc2").addClass("current");
                    }
                    else if ($("#credit_card_yes").prop("checked") == true) {
                        alert("信用卡");
                        num = 2;
                        $("#step0").hide();
                        $("#" + stepName).hide();
                        $("#step" + (i - num)).show();
                        $(submmitButtonName).hide();
                        selectStep(i - num);
                    }
                }
                else {
                    alert("沒選");
                    num = 0;
                    $("#" + stepName).hide();
                    $("#step" + (i - num)).show();
                    $(submmitButtonName).hide();
                    selectStep(i - num);
                }

            });
        }

        function createNextButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Next' class='next'>下一步 ></a>");
            $("#" + stepName + "Next").bind("click", function (e) {

                if ($("#create_member_no").prop("checked") == true) {
                    alert("會員");
                    $("#step0").hide();
                    $("#step1").show();
                    $("#steps li").removeClass("current");
                    $("#stepDesc1").addClass("current");
                    if ($("#credit_card_yes").prop("checked") == true && $("#create_church").prop("checked") == true) {
                        alert("兩個");
                        num = 1;
                        $("#step1").hide();
                        $("#" + stepName).hide();
                        $("#step" + (i + num)).show();
                        if (i + 2 == count)
                            $(submmitButtonName).show();
                        selectStep(i + num);
                    }  else if ($("#create_church").prop("checked") == true) {
                        alert("教會");
                        $("#step1").hide();
                        $("#step2").show();
                        $(submmitButtonName).show();
                        $("#steps li").removeClass("current");
                        $("#stepDesc2").addClass("current");
                        $("#step2Next").hide();
                    }
                    else if ($("#credit_card_yes").prop("checked") == true) {
                        alert("信用卡");
                        num = 2;
                        $("#" + stepName).hide();
                        $("#step" + (i + num)).show();
                        $(submmitButtonName).show();
                        selectStep(i + num);
                    }
                }
                else {
                    alert("沒選");
                    num = 0;
                    $("#" + stepName).hide();
                    $("#step" + (i + num)).show();
                    $(submmitButtonName).show();
                    selectStep(i + num);
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
    $('#SignupForm').course_registrationsToWizard({
        submitButton: 'SaveAccount'
    });

});
/**
 * Created by User on 2017/1/9.
 */
