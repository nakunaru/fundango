
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

$(document).on( "pageshow", "#notify", function( event ) {
    $('#footernotify').addClass('ui-btn-active');
    panelOpenInit();
});

$(document).on( "pageshow", "#board", function( event ) {
    $('#footerboard').addClass('ui-btn-active');
    panelOpenInit();
});

$(document).on( "pageshow", "#deposit", function( event ) {
    $('#footerdeposit').addClass('ui-btn-active');
    panelOpenInit();
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
    $('#footerhome').addClass('ui-btn-active');

    panelOpenInit();

    $('.ui-page-active .friendli').click(function(){
        //$( "#dialogPage" ).dialog({ overlayTheme: "b" });
        var screen_name = $(this).attr('screen_name');
        var tuserid = $(this).attr('tuserid');
        $('#depositaddscreenname').attr('screen_name',screen_name).text(screen_name + 'さんに私の団子を預けます');
        $('#to_screen_name').val(screen_name);
        $('#to_tuserid').val(tuserid);
        $('#message').val("");
    });

    //URLを自動リンクする
    //var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
    //$('#timelinelist').html($('#timelinelist').html().replace(exp,"<a href='$1'>$1</a>"));

    $('.timelinetext').each(function(){
        $(this).html( $(this).html().replace(/((http|https|ftp):\/\/[\w?=&.\/-;#~%-]+(?![\w\s?&.\/;#~%"=-]*>))/g, '<a href="$1">$1</a> ') );
    });

    /*
    $('#depositaddsubmit').click(function(){
        $('.ui-dialog').dialog('close')
    });
    */
    //$('#homemyicon').badger('100d');
});

function panelOpenInit()
{
    $( ".ui-page-active #settingopenbtn" ).click(function() {
        $('.ui-page-active #settingpanel').panel('open');
    });
    $( ".ui-page-active #friendopenbtn" ).click(function() {
        $('.ui-page-active #friendpanel').panel('open');
    });
}
