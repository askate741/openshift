$(document).ready(function () {
    $('#SignupForm').bootstrapValidator({

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            church_no: {
                validators: {
                    notEmpty: {
                        message: '請選擇所屬教會'
                    }
                }
            },
            member_type: {
                validators: {
                    notEmpty: {
                        message: '請選擇身分類型'
                    }
                }
            },
            devotee_name: {
                validators: {
                    stringLength: {
                        max: 32,
                    },
                    notEmpty: {
                        message: '請填寫姓名'
                    },
                    regexp: {
                        regexp: /^[\u4e00-\u9fa5 a-zA-Z]+$/, /*填寫中文字&英文字的正規表達式*/
                        message: '只能填寫中文&英文'
                    }
                }
            },
            title: {
                validators: {
                    stringLength: {
                        max: 32,
                    },
                    notEmpty: {
                        message: '請填奉獻抬頭'
                    },
                }
            },
            birthday: {
                validators: {
                    callback: {
                        message: '『出生日期』不能大於『今天日期』',
                        callback: function (birthday, validator) {
                            var today = new Date();
                            var year = today.getFullYear();
                            var month = (today.getMonth() + 1 );
                            var date = today.getDate();
                            if (birthday === "") {/*因為離會日期可以不用填，所以為空時不動作*/
                                return true;
                            } else {
                                if (month < 10 && date < 10) {
                                    today = year + "-0" + month + "-0" + date;
                                }
                                else if (month < 10) {
                                    today = year + "-0" + month + "-" + date;
                                }
                                else if (date < 10) {
                                    today = year + "-" + month + "-0" + date;
                                }
                                else {
                                    today = year + "-" + month + "-" + date;
                                }
                                return birthday <= today;
                            }
                        }
                    }
                }
            },
            date_in: {
                validators: {
                    notEmpty: {
                        message: '請填寫入會/到職日'
                    },
                    callback: {
                        message: '『入會/到職日期』不能大於『離會/離職日期』',
                        callback: function (date_in, validator) {
                            var date_out = $('#SignupForm').find("input[name='date_out']").val();
                            validator.updateStatus('date_out', 'VALID');
                            if (date_out === "") {/*因為離會日期可以不用填，所以為空時不動作*/
                                return true;
                            } else {
                                return date_in <= date_out;
                            }
                        }
                    }
                }
            },
            date_out: {
                validators: {
                    callback: {
                        message: '『離會/離職日期』不能小於『入會/到職日期』',
                        callback: function (date_out, validator) {
                            var date_in = $('#SignupForm').find("input[name='date_in']").val();
                            // $('#SignupForm').find("input[name='date_in']").change();
                            validator.updateStatus('date_in', 'VALID');
                            return date_out >= date_in;
                        }
                    }
                }
            },
            uid: {
                validators: {
                    regexp: {
                        regexp: /^[A-Z][1-2]\d{8}$/,
                        message: '請確認生分證字號'
                    }
                }
            },
            member_tel: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 11,
                        message: '請確認電話號碼長度'
                    },
                    regexp: {
                        regexp: /^[0][1-8][1-9][0-9]{6,8}$/,
                        message: '請確認市話號碼'
                    }
                }
            },
            mobile: {
                validators: {
                    regexp: {
                        regexp: /^[0][9][1-8][0-9]{6,8}$/,
                        message: '請確認手機號碼'
                    }
                }
            },
            add2_zipcode: {
                validators: {
                    stringLength: {
                        min: 3,
                        max: 5
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: '只能填寫數字'
                    }
                }
            },
            add2_city: {
                validators: {
                    callback: {
                        callback: function (value, validator, $field) {
                            return true;
                        }
                    }
                }
            },
            add2_dist: {
                validators: {
                    callback: {
                        callback: function (value, validator, $field) {
                            return true;
                        }
                    }
                }
            },
            add2_street: {
                validators: {
                    stringLength: {
                        min: 3,
                        max: 32
                    },
                    regexp: {
                        regexp: /^[\u4e00-\u9fa5 0-9a-zA-Z]+$/, /*填寫中文字&數字的正規表達式*/
                        message: '只能填寫中文&英文&數字'
                    },
                }
            },
            add1_zipcode: {
                validators: {
                    stringLength: {
                        min: 3,
                        max: 5
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: '只能填寫數字'
                    }
                }
            },
            add1_city: {
                validators: {
                    callback: {
                        callback: function (value, validator, $field) {
                            return true;
                        }
                    }
                }
            },
            add1_dist: {
                validators: {
                    callback: {
                        callback: function (value, validator, $field) {
                            return true;
                        }
                    }
                }
            },
            add1_street: {
                validators: {
                    stringLength: {
                        min: 3,
                        max: 32
                    },
                    regexp: {
                        regexp: /^[\u4e00-\u9fa5 0-9a-zA-Z]+$/, /*填寫中文字&數字的正規表達式*/
                        message: '只能填寫中文&英文&數字'
                    }
                }
            },
            email: {
                validators: {
                    stringLength: {
                        max: 50,
                    },
                    emailAddress: {
                        message: '請提供有效的電子郵件地址'
                    }
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
            issue_bank: {
                validators: {
                    stringLength: {
                        max: 16,
                    },
                    regexp: {
                        regexp: /^[\u4e00-\u9fa5]+$/, /*填寫中文字&英文字的正規表達式*/
                        message: '只能填寫中文'
                    },
                    notEmpty: {
                        message: '請填發卡銀行'
                    }
                }
            },
            card_id: {
                validators: {
                    notEmpty: {
                        message: '請填寫信用卡卡號'
                    },
                    callback: {
                        message: '請填寫正確的信用卡卡號',
                        callback: function (value, validator, $field) {
                            var ver = /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|622((12[6-9]|1[3-9][0-9])|([2-8][0-9][0-9])|(9(([0-1][0-9])|(2[0-5]))))[0-9]{10}|64[4-9][0-9]{13}|65[0-9]{14}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})*$/;
                            if (ver.test(value) === true) {
                                /*信用卡卡號規則：
                                 由右至左（共 1 ～ 16 ），奇數位乘上 1 ，偶數位乘上 2 ，共得出 16 個[新數字]
                                 將每個[新數字]的十位數加上個位數，再產生[新新數字]；共16個[新新數字]
                                 把所有16個[新新數字]合計加總，能整除10者，為正確卡號。*/
                                var card_id = [];
                                var num = 0;
                                var count = 0;
                                var sum = 0;
                                for (count = 0; count <= 15; count++) {
                                    num = parseInt(value.substring(count, count + 1));
                                    //奇數位乘1 ，偶數位乘2，由16~1位
                                    if ((count + 1) % 2 !== 0) {
                                        card_id[count] = num * 2;
                                    }
                                    else {
                                        card_id[count] = num;
                                    }
                                }
                                for (count = 0; count <= 15; count++) {
                                    if (card_id[count] > 9) {
                                        card_id[count] = (card_id[count] % 10) + 1;
                                    }
                                    sum += card_id[count];
                                }
                                if (sum % 10 === 0) {
                                    if (value.substr(0, 1) === "4") {
                                        $("#type").val("V");
                                    }
                                    else if (value.substr(0, 1) === "5") {
                                        $("#type").val("M");
                                    }
                                    else if (value.substr(0, 1) === "3") {
                                        $("#type").val("J");
                                    }
                                    else if (value.substr(0, 2) === "62") {
                                        $("#type").val("U");
                                    }
                                    validator.updateStatus('type', 'VALID');
                                    return true;
                                } else {
                                    $("#type").val("");
                                    validator.updateStatus('type', 'INVALID');
                                    return false;
                                }
                            } else {
                                $("#type").val("");
                                validator.updateStatus('type', 'INVALID');
                                return false;
                            }

                        }
                    }
                }
            },
            type: {
                validators: {
                    notEmpty: {
                        message: '請選擇信用卡別'
                    },
                }
            },
            exp: {
                validators: {
                    notEmpty: {
                        message: '請填寫信用卡截止日'
                    },
                    callback: {
                        message: '此信用卡已到期',
                        callback: function (exp, validator) {
                            var today = new Date();
                            var year = today.getFullYear();
                            var month = (today.getMonth() + 1 );
                            var date = today.getDate();
                            if (month < 10 && date < 10) {
                                today = year + "-0" + month + "-0" + date;
                            }
                            else if (month < 10) {
                                today = year + "-0" + month + "-" + date;
                            }
                            else if (date < 10) {
                                today = year + "-" + month + "-0" + date;
                            }
                            else {
                                today = year + "-" + month + "-" + date;
                            }
                            return exp > today;
                        }
                    }
                }
            },
            donate_start: {
                validators: {
                    notEmpty: {
                        message: '請填寫捐款期間-起'
                    },
                    callback: {
                        message: '『捐款期間-起』不能大於『捐款期間-迄』',
                        callback: function (donate_start, validator) {
                            var donate_end = $('#SignupForm').find("input[name='donate_end']").val();
                            if (donate_end !== "") {
                                validator.updateStatus('donate_end', 'VALID');
                            }
                            return donate_start <= donate_end;
                        }
                    }
                }
            },
            donate_end: {
                validators: {
                    notEmpty: {
                        message: '請填寫捐款期間-迄'
                    },
                    callback: {
                        message: '『捐款期間-迄』不能小於『捐款期間-起』',
                        callback: function (donate_end, validator) {
                            var donate_start = $('#SignupForm').find("input[name='donate_start']").val();
                            if (donate_start !== "") {
                                validator.updateStatus('donate_start', 'VALID');
                            }
                            return donate_end >= donate_start;
                        }
                    }
                }
            },
            donate_times: {
                validators: {
                    notEmpty: {
                        message: '請填寫捐款次數'
                    },
                    regexp: {
                        regexp: /^[1-9][0-9]*$/,
                        message: '請確認捐款次數'
                    },
                }
            },
            donate_way: {
                validators: {
                    notEmpty: {
                        message: '請選擇捐款方式'
                    }
                }
            },
            promise_amount: {
                validators: {
                    notEmpty: {
                        message: '請填寫承諾金額'
                    },
                    regexp: {
                        regexp: /^[1-9][0-9]*$/,
                        message: '請確認承諾金額'
                    },
                }
            },
            member_no: {
                validators: {
                    notEmpty: {
                        message: '請選擇購買會員'
                    }
                }
            },
            product_no: {
                validators: {
                    notEmpty: {
                        message: '請選擇產品'
                    }
                }
            },
            product_name: {
                validators: {
                    notEmpty: {
                        message: '請填寫產品名稱'
                    },
                    stringLength: {
                        max: 16,
                    },
                    regexp: {
                        regexp: /^[\u4e00-\u9fa5 a-zA-Z]+$/, /*填寫中文字&英文字的正規表達式*/
                        message: '只能填寫中文&英文'
                    }
                }
            },
            actual_price: {
                validators: {
                    notEmpty: {
                        message: '請填寫實際價格'
                    },
                    regexp: {
                        regexp: /^[1-9][0-9]*$/,
                        message: '請確認實際價格'
                    }
                }
            },
            quantity: {
                validators: {
                    notEmpty: {
                        message: '請填寫進貨數量'
                    },
                    regexp: {
                        regexp: /^[1-9][0-9]*$/,
                        message: '請確認進貨數量'
                    }
                }
            }
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
            window.location.pathname = "product_order";
            /*跳轉道member首頁*/
        });
})
;