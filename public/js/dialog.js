$(function() {
    $( "#dialog" ).dialog({
        autoOpen: false,
        height: 300,
        width: 450,
        modal: true,
    });
    $( "#opener" ).click(function() {
        $( "#dialog" ).dialog( "open" );
        return false;
    });
});