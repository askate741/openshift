<script>
    var dist =<?php echo json_encode($data);?>;
    var city =<?php echo json_encode($city);?>;
    $(function () {
        city_sel();
        dist_sel();
        $(".city").change(dist_sel);
    });
    function city_sel() {
        for (var key in city) {
            $(".city").append("<option value=" + city[key] + ">" + city[key] + "</option>")
        }
    }
    function dist_sel() {
        $(".dist").html('');
        var city_value = $(".city").find("option:selected").val();
        var sel2_option = dist[city_value];
        for (var key in sel2_option) {
            var value = sel2_option[key];
            $(".dist").append("<option value=" + value + ">" + value + "</option>")
        }
    }
</script>
<label for="city"></label>
<select class="city" name={{$name1}}>
    <option value="%" selected="">請選擇縣市</option>
</select>
<select class="dist" name={{$name2}}></select>
