$(document).ready(function () {
    $('#SignupForm').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            course_type_no: {
                validators: {
                    notEmpty: {
                        message: '請選擇課程分類'
                    }
                }
            },
            course_type_name: {
                validators: {
                    stringLength: {
                        max: 8
                    },
                    regexp: {
                        regexp: /^[\u4e00-\u9fa5 0-9a-zA-Z]+$/,
                        message: '只能填寫中文&英文&數字'
                    },
                    notEmpty: {
                        message: '請填寫課程分類名稱'
                    }
                }
            },
            course_name: {
                validators: {
                    stringLength: {
                        max: 32
                    },
                    regexp: {
                        regexp: /^[\u4e00-\u9fa5 0-9a-zA-Z]+$/,
                        message: '只能填寫中文&英文&數字'
                    },
                    notEmpty: {
                        message: '請填寫課程名稱'
                    },
                }
            },
            church_no: {
                validators: {
                    notEmpty: {
                        message: '請選擇主辦單位'
                    },
                }
            },
            member_no: {
                validators: {
                    notEmpty: {
                        message: '請選擇牧者同工'
                    },
                }
            },
            section_count: {
                validators: {
                    notEmpty: {
                        message: '請填寫堂數'
                    },
                    regexp: {
                        regexp: /^[1-9][0-9]*$/,
                        message: '請確認堂數'
                    },
                }
            },
            date_start: {
                validators: {
                    notEmpty: {
                        message: '請填寫課程日期-起'
                    },
                    callback: {
                        message: '『課程日期-起』不能大於『課程日期-迄』',
                        callback: function (date_start, validator) {
                            var date_end = $('#SignupForm').find("input[name='date_end']").val();
                            if (date_end !== "") {
                                validator.updateStatus('date_end', 'VALID');
                            }
                            return date_start <= date_end;
                        }
                    }
                }
            },
            date_end: {
                validators: {
                    notEmpty: {
                        message: '請填寫課程日期-迄'
                    },
                    callback: {
                        message: '『課程日期-迄』不能小於『課程日期-起』',
                        callback: function (date_end, validator) {
                            var date_start = $('#SignupForm').find("input[name='date_start']").val();
                            if (date_start !== "") {
                                validator.updateStatus('date_start', 'VALID');
                            }
                            return date_end >= date_start;
                        }
                    }
                }
            },
            course_memo: {
                validators: {
                    stringLength: {
                        max: 64
                    },
                }
            },
            church_name: {
                validators: {
                    stringLength: {
                        max: 50
                    },
                    notEmpty: {
                        message: '請填寫教會名稱'
                    },
                    regexp: {
                        regexp: /^[\u4e00-\u9fa5 a-zA-Z]+$/, /*填寫中文字&英文字的正規表達式*/
                        message: '只能填寫中文&英文'
                    }
                }
            },
            add_zipcode: {
                validators: {
                    stringLength: {
                        min: 3,
                        max: 5
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: '只能填寫數字'
                    },
                    notEmpty: {
                        message: '請填寫通訊郵遞區號'
                    }
                }
            },
            add_city: {
                validators: {
                    notEmpty: {
                        message: '請選擇通訊縣市'
                    },
                }
            },
            add_dist: {
                validators: {
                    notEmpty: {
                        message: '請選擇通訊縣市'
                    },
                }
            },
            add_street: {
                validators: {
                    stringLength: {
                        min: 3,
                        max: 32
                    },
                    notEmpty: {
                        message: '請填寫通訊地址'
                    },
                    regexp: {
                        regexp: /^[\u4e00-\u9fa5 0-9a-zA-Z]+$/, /*填寫中文字&數字的正規表達式*/
                        message: '只能填寫中文&英文&數字'
                    },
                }
            },
            church_tel: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 11,
                        message: '請確認電話號碼長度'
                    },
                    notEmpty: {
                        message: '請填寫電話號碼'
                    },
                    regexp: {
                        regexp: /^[0]{1}[0-9]{1,3}[0-9]{5,8}$/, /*填寫正規表達式*/
                        message: '請填寫正確的電話號碼'
                    },
                }
            },
            ext: {
                validators: {
                    stringLength: {
                        max: 5,
                    },
                    regexp: {
                        regexp: /[0-9]$/, /*填寫正規表達式*/
                        message: '只能填寫數字'
                    },
                }
            },
            web_or_mail: {
                validators: {
                    stringLength: {
                        max: 50,
                    },
                    emailAddress: {
                        message: '請提供有效的電子郵件地址'
                    }
                }
            },
            contact: {
                validators: {
                    stringLength: {
                        max: 16,
                    },
                    regexp: {
                        regexp: /^[\u4e00-\u9fa5 a-zA-Z]+$/, /*填寫中文字&英文字的正規表達式*/
                        message: '只能填寫中文&英文'
                    }
                }
            },
        }
    })
        .on('success.form.bv', function (e) {
            $('#SaveAccount').addClass('disabled');
            /*禁用按鈕防止跳轉時亂點*/
            $('#SignupForm').data('bootstrapValidator').resetForm();
            /*重製表單防止重複送*/
            e.preventDefault();
            var $form = $(e.target);
            $.post($form.attr('action'), $form.serialize(), function (result) {
            }, 'json');
            window.location.pathname = "course";
            /*跳轉道church首頁*/
        });
});