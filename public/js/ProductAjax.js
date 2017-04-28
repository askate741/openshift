$(function () {
    $('#product_no').change(event => {

        $.ajax({
            url: `/product_orders/${event.target.value}`,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var inventory = 0;
                $("#original_price").remove();
                for (var i = 0; i < data[0].length; i++) {
                    inventory += data[0][i].quantity;
                    /*庫存量*/
                }
                $('#inventory').val(inventory);
                $(".actual_price").append("<small id='original_price' class='control-label col-md-1' style='color:blue;'> 原價: " + data[1] + "元</small>");
                /*原價*/
            },
            cache: false
        });
    });
});