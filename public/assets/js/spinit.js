
var global_tekitou = 'test';

/**
 * 
 */
 /*
$('#login').live('pageinit', function(e) {
    var test = "";
});

$('#home').live('pageinit', function(e) {
    $('#howtopanel').panel('open');
});
*/
$(document).on( "pageinit", "#login", function( event ) {
    //alert( "This page was just enhanced by jQuery Mobile!" );
    //$('.tweet').socialbutton('twitter',{button : "horizontal"}).width(95);
    //$('.facebook_like').socialbutton('facebook_like',{button : "button_count"}).width(110);
    var test = "";
});

//$(document).on( "pageinit", "#home", function( event ) {
$(document).on( "pageshow", "#home", function( event ) {
    var aaa = "";
    /*
    $( "#settingopenbtn" ).bind( "click", function(event, ui) {
        $('#settingpanel').panel('open');
    });
    $( "#friendopenbtn" ).bind( "click", function(event, ui) {
        $('#friendpanel').panel('open');
    });
    */
    $( ".ui-page-active #settingopenbtn" ).click(function() {
        $('.ui-page-active #settingpanel').panel('open');
    });
    $( ".ui-page-active #friendopenbtn" ).click(function() {
        $('.ui-page-active #friendpanel').panel('open');
    });

    $('.ui-page-active .friendli').click(function(){
        //$( "#dialogPage" ).dialog({ overlayTheme: "b" });
        var screen_name = $(this).attr('screen_name');
        var tuserid = $(this).attr('tuserid');
        $('#depositaddscreenname').attr('screen_name',screen_name).text(screen_name + 'さんに私の団子を預けます');
        $('#to_screen_name').val(screen_name);
        $('#to_tuserid').val(tuserid);
    });
    /*
    $('#depositaddsubmit').click(function(){
        $('.ui-dialog').dialog('close')
    });
    */
    //$('#homemyicon').badger('100d');
});
