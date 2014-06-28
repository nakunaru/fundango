
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
    $('.tweet').socialbutton('twitter',{button : "horizontal"}).width(95);
    $('.facebook_like').socialbutton('facebook_like',{button : "button_count"}).width(110);
});

$(document).on( "pageinit", "#home", function( event ) {
    //$('#howtopanel').panel('open');
});
