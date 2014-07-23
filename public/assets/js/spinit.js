
//var global_tekitou = 'test';

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

var doughnutData = [
    {
        value: 30,
        color:"#aaf2fb"
    },
    {
        value: 50,
        color: "#ffb6b9"
    },
    {
        value: 120,
        color: "#ffe361"
    },
    {
        value: 170,
        color: "#fbaa6e"
    },
    {
        value: 70,
        color: "#A8BECB"
    }
];

var linechartdata = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
    ]
};


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
    var ctx = $("#chartcanvas").get(0).getContext("2d");
    $('#ui-id-2').click(function(){
        new Chart(ctx).Line(linechartdata, {
            bezierCurve: false
        });
    });
    /*
    var myDoughnut = new Chart(document.getElementById("chartcanvas").
            getContext("2d"));
    $('#ui-id-2').click(function(){
        myDoughnut.Doughnut(doughnutData);
    });
    */
});

$(document).on( "pageshow", "#deposit", function( event ) {
    $('#footerdeposit').addClass('ui-btn-active');
    panelOpenInit();
});

//$(document).on( "pageinit", "#home", function( event ) {
$(document).on( "pageshow", "#home", function( event ) {
    var aaa = "";
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
        var myDoughnut = new Chart(document.getElementById("accountchartcanvas").
            getContext("2d")).Doughnut(doughnutData);
        $('.ui-page-active #settingpanel').panel('open');
    });
    $( ".ui-page-active #friendopenbtn" ).click(function() {
        $('.ui-page-active #friendpanel').panel('open');
    });
}
