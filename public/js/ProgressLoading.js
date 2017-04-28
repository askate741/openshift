var opts = {
    lines: 13, // 花瓣數目
    length: 20, // 花瓣長度
    width: 10, // 花瓣寬度
    radius: 30, // 花瓣距中心半徑
    corners: 1, // 花瓣圆滑度 (0-1)
    rotate: 0, // 花瓣旋轉角度
    direction: 1, // 花瓣旋转方向 1: 順時針, -1: 逆時針
    color: '#5882FA', // 花瓣颜色
    speed: 1, // 花瓣旋轉速度
    trail: 60, // 花瓣旋轉时的拖影(百分比)
    shadow: false, // 花瓣是否顯示陰影
    hwaccel: false, //spinner 是否啟用硬件加速及高速旋转
    className: 'print_spinner', // spinner css 樣式名稱
    zIndex: 2e9, // spinner的z軸 (默認是2000000000)
    top: '50%', // spinner 相對父容器Top定位 單位 px
    left: '50%'// spinner 相對父容器Le1ft定位 單位 px
};
var spinner = new Spinner(opts);
