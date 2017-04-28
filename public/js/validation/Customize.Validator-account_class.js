$(document).ready(function () {
    $('#SignupForm').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            subclass1_no: {
                validators: {
                    notEmpty: {
                        message: '請選擇'
                    },
                }
            },
            subclass1_name: {
                validators: {
                    notEmpty: {
                        message: '請填寫會計科目1'
                    },
                }
            },
            subclass2_name: {
                validators: {
                    notEmpty: {
                        message: '請填寫會計科目2'
                    },
                }
            },
        }
    })
        .on('success.form.bv', function (e) {
            $('#account_class-post').addClass('disabled');/*禁用按鈕防止跳轉時亂點*/
            $('#SignupForm').data('bootstrapValidator').resetForm();/*重製表單防止重複送*/
            e.preventDefault();
            var $form = $(e.target);
            $.post($form.attr('action'), $form.serialize(), function (result) {
            }, 'json');
            window.location.pathname="account_class";/*跳轉道church首頁*/
        });
});