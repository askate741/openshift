$(function() {
    $( "#download_dialog" ).dialog({
        autoOpen: false,
        height: 200,
        width: 450,
        modal: true,
    });
    $( "#download" ).click(function() {
        $( "#download_dialog" ).dialog( "open" );
        return false;
    });
});