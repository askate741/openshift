/**
 * @return {string}
 */
var NumberToChinese = function (n) {
    var fraction = ['角', '分'];
    var digit = [
        '零', '壹', '贰', '參', '肆',
        '伍', '陸', '柒', '捌', '玖'
    ];
    var unit = [
        ['', '萬', '億'],
        ['', '拾', '佰', '仟']
    ];
    var head = n < 0 ? '欠' : '';
    n = Math.abs(n);
    var s = '';
    for (var i2 = 0; i2 < fraction.length; i2++) {
        s += (digit[Math.floor(n * 10 * Math.pow(10, i2)) % 10] + fraction[i2]).replace(/零./, '');
    }
    s = s || '';
    n = Math.floor(n);
    for (var i3 = 0; i3 < unit[0].length && n > 0; i3++) {
        var p = '';
        for (var j = 0; j < unit[1].length && n > 0; j++) {
            p = digit[n % 10] + unit[1][j] + p;
            n = Math.floor(n / 10);
        }
        s = p.replace(/(零.)*零$/, '').replace(/^$/, '零') + unit[0][i3] + s;
    }
    return head + s.replace(/(零.)*零元/, '')
            .replace(/(零.)+/g, '零')
            .replace(/^整$/, '');
};
