<script>
    /**
     * @return {string}
     */

    function Chinese(str) {

        str = str.replace(/,/g, "");
        var AU = [];
        var ans = "";
        var chi = "零壹貳參肆伍陸柒捌玖";
        for (var i = 0; i < str.length; i++) ans += chi.charAt(parseInt(str.charAt(i)));
        for (var i = ans.length; i > 0; i--) {
            var U = "";
            var k = i;
            while ((k - 13) >= 0) {
                k -= 12;
                U += "兆";
            }
            while ((k - 9) >= 0) {
                k -= 8;
                U += "億";
            }
            while ((k - 5) >= 0) {
                k -= 4;
                U += "萬";
            }
            if (k > 1) U = "";
            while ((k - 4) >= 0) {
                k -= 3;
                U += "仟";
            }
            while ((k - 3) >= 0) {
                k -= 2;
                U += "佰";
            }
            while ((k - 2) >= 0) {
                k -= 1;
                U += "拾";
            }
            var tU = "";
            var r = U.length;
            while (r-- > 0) tU = tU + U.charAt(r);
            if (tU != "") AU.push(tU);
        }
        AU.push("");
        var final = "";
        for (i = 0; i < ans.length; i++) {
            final += ans.charAt(i) + AU[i];
        }
        while (final.match(/零[仟佰拾]零/)) final = final.replace(/零[仟佰拾]零/g, "零");
        final = final.replace(/零[仟佰拾]/g, "零").replace(/零兆/g, '兆').replace(/零億/g, '億').replace(/零萬/g, '萬');
        final = final.replace(/兆[仟佰拾億萬][兆億萬仟佰拾]*/g, '兆零').replace(/億[仟佰拾萬][兆億萬仟佰拾]*/g, '億零').replace(/萬[仟佰拾][兆億萬仟佰拾]*/g, '萬零');
        final = final.replace(/^壹拾/, "拾");
        while (final.match(/零$/)) final = final.replace(/零$/, "");
        return final;

    }

</script>
<form onsubmit="alert(Chinese(this.numb.value))">
    <input name=numb size=50>
    <br><input type="submit">
</form>