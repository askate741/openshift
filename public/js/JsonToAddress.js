/*
 * JsonToAddress - jQuery / JsonToAddress selects plugin
 *
 * Copyright (c) 2017 HUANG,YAO-HUI
 *
 * Project home:
 *
 * Version: 1.0.0
 *
 */

(function ($) {
    $.fn.JsonToAddress = function (options) {
        options = $.extend({
            zipcode_name: "",
            city_name: "",
            dist_name: "",
            // temp_city_name: "",
            // temp_dist_name: ""
        }, options);
        var zipcode_name = "#" + options.zipcode_name;
        var city_name = "#" + options.city_name;
        var dist_name = "#" + options.dist_name;
/*        var temp_city_name = "#" + options.temp_city_name;
        var temp_dist_name = "#" + options.temp_dist_name;*/
        $.getJSON("../../downloads/address.json", function (data) {
            $(function () {
                city_sel();
                dist_sel();

                $(city_name).change(dist_sel);

                // $(city_name).val($(temp_city_name).val()).trigger("change");
                // $(dist_name).val($(temp_dist_name).val());
                // if($(city_name).val()!=null){
                //     $.load.trigger("change");
                // }
            });
            //noinspection JSUnresolvedFunction
            $(zipcode_name).keyup(function () {
                var zn = $(zipcode_name).val();
                $.each(data, function (ind, value) {
                    $.each(value, function (ind2, value2) {
                        //判斷陣列值是否等於User輸入的值
                        if (zn !== "" && zn.length >= 3) {
                            if (value2.match(zn.substr(0,3)) !== null) {/*判斷是否相同，相同的話會!=null*//*zn只抓三碼是為了解決修改時郵遞區號超過三碼時無法正常帶路的bug*/
                                $(city_name).val(ind).trigger("change");   //設定selected value
                                $(dist_name).val(value2).trigger("change");/*2017_03_30新加入.trigger("change")，使他能觸發驗證*/
                                return false;//如果查到了就結束each陣列
                            }
                        }
                    });
                });
            });
            $(zipcode_name).keyup();  /*2017_03_30新加入.keyup()，此方法能解決帶資料時的bug*/

            function city_sel() {
                for (var key in data) {
                    $(city_name).append("<option value=" + key + ">" + key + "</option>");
                }
            }

            function dist_sel() {
                $(dist_name).html('');
                var city1_value = $(city_name).find("option:selected").val();
                var dist1_option = data[city1_value];
                for (var key in dist1_option) {
                    var dist1_value = dist1_option[key];
                    $(dist_name).append("<option value=" + dist1_value + ">" + dist1_value + "</option>")
                }
            }
        });
    }
})(jQuery);
