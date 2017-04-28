$(function(){
    var w = $("#slider_content").width();
    $("#slider_tab").mouseover(function(){ //滑鼠滑入時
        if ($("#slider_scroll").css('left') == '-'+w+'px')
        {
            $("#slider_scroll").animate({ left:'0px' }, 600 ,'swing');
        }
    });
    $("#slider_content").mouseleave(function(){　//滑鼠離開後
        $("#slider_scroll").animate( { left:'-'+w+'px' }, 600 ,'swing');
    });
});


