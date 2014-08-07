
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

var timeline_timer = 0;

var radarchartdata = {
    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 96, 27, 100]
        }
    ]
};


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

var barchartdata = {
    labels: ["kara_mage", "devfundango", "bryu_seru", "user2", "user3", "user4", "user5"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
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
    var ctx2 = $("#chartcanvas").get(0).getContext("2d");
    $('#ui-id-2').click(function(){
        new Chart(ctx2).Line(linechartdata, {
            bezierCurve: false
        });
    });
    var ctx3 = $("#rankingcanvas").get(0).getContext("2d");
    $('#ui-id-3').click(function(){
        new Chart(ctx3).Bar(barchartdata, {
            barShowStroke: false
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
    //var wow = new WOW();
    //wow.init();
    //new WOW().init();
    panelOpenInit();

    /*
    if (timeline_timer != 0) {
       return;
    }
    */

    $('#footerhome').addClass('ui-btn-active');


    $('.ui-page-active .friendli').unbind('click').click(function(){
        //$( "#dialogPage" ).dialog({ overlayTheme: "b" });
        var screen_name = $(this).attr('screen_name');
        var tuserid = $(this).attr('tuserid');
        $('#depositaddscreenname').attr('screen_name',screen_name).text(screen_name + 'さんに私の団子を預けます');
        $('#to_screen_name').val(screen_name);
        $('#to_tuserid').val(tuserid);
        $('#message').val("");
        $('#todepoimg').attr('src', $(this).attr('image_url'));
        $('#tweetflipswitch').val(true);
    });

    /*
    setUrlLink();
    $('.currli').removeClass('currli');
    */
    /*
    $('#depositaddsubmit').click(function(){
        $('.ui-dialog').dialog('close')
    });
    */
    //$('#homemyicon').badger('100d');

    //if (timeline_timer == 0) {
    //最初の呼び出し
    getTimeline();

    if (timeline_timer != 0) {
        clearInterval(timeline_timer);
    }
    //タイムライン取得を６０秒間隔で行う
    timeline_timer = setInterval("getTimeline()",60000);
    //}
});

/**
 * URLを自動リンクする
 */
function setUrlLink() {
    //URLを自動リンクする
    //var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
    //$('#timelinelist').html($('#timelinelist').html().replace(exp,"<a href='$1'>$1</a>"));

    $('.currli .timelinetext').each(function(){
        $(this).html( $(this).html().replace(/((http|https|ftp):\/\/[\w?=&.\/-;#~%-]+(?![\w\s?&.\/;#~%"=-]*>))/g, '<a href="$1">$1</a> ') );
    });

    //@ユーザ名を自動リンクする
    // 要素を指定
    $('.currli .timelinetext').each(function() {
        var _html;
        _html = $(this).html().replace(/(^|\>)([^\<]*\@[^\<]*)(\<|$)/g, function() {
            return arguments[1]
                + arguments[2]
                .replace(/\@([a-z0-9\_]+)(\.)?/gi, function() {
                    if(arguments[2]) return arguments[0];
                    return '<a href="https://www.twitter.com/'
                        + arguments[1] + '" target="_blank" class="twlink">@'
                        + arguments[1] + '</a>';
                })
                + arguments[3];
        });
        $(this).html(_html);
    });
}

function getTimeline()
{
    //var since_id = $('.ui-page-active .timelineli').attr('timelineid');
    var since_id = $('.timelinedivider').attr('since_id');
    var url = $('#timelinelist').attr('timelineurl');
    var timelineul = $('.ui-page-active #timelinelist');
    var timelineultmp = $('.ui-page-active #timelinelisttmp');
    $.mobile.loading( "show", {
        text: "Loading...",
        textVisible: true,
        theme: "a",
        html: ""
    });
    $.ajax({
        type: "POST",
        url: url,
        data: "since_id=" + since_id,
        success: function(timeline){
            if (timeline == undefined || timeline == null || timeline.length == undefined) {
                return;
            }
            //alert( "Data Saved: " + data );
            $('.timelinedivider').remove();
            var since_id = 0;
            for (var i=0; i<timeline.length; i++) {
                if (since_id == 0) {
                   since_id = timeline[i].id;
                }
                var $data = timeline[i];
                var str = '<li class="timelineli currli" timelineid="' + $data.id + '" >'
                    + '<img class="slideRight" src="' + $data.user.profile_image_url
                    + '"><div class="timelinetext slideLeft" style="text-overflow:ellipsis; overflow:hidden; white-space: normal; width: 80%">'
                    + $data.text + '</div>'
                    + '<p class="ui-li-aside">' + $data.datestr + '</p>'
                    + '<p style="text-overflow:ellipsis; overflow:hidden; ">'
                    + $data.user.name + ' @' + $data.user.screen_name + '</p>'
                    + '<p class="ui-li-count">' + $data.credit + 'd</p>'
                    //+ '<a href="#">デポる</a>'
                    ;
                //$(timelineul).prepend(str);
                var img = getImageUrlLink($data);
                if (img) {
                   str += '<img class="slideUp" src="' + img + '">';
                }
                str += '</li>';
                $(timelineultmp).append(str);
            }
            $(timelineul).prepend($(timelineultmp).html());
            $(timelineultmp).html('');
            $(timelineul).prepend('<li class="timelinedivider" since_id="' + since_id + '" data-role="list-divider">タイムライン</li>');
            $(timelineul).listview('refresh');
        },
        complete: function() {
            setUrlLink();
            $('.currli').removeClass('currli');
            $.mobile.loading( "hide", {
                text: "Loading...",
                textVisible: true,
                theme: "a",
                html: ""
            });
        }
    });
}

/**
 * 画像をプレビューするために自動リンクする
 * @param $data
 * @returns {boolean}
 */
function getImageUrlLink($data)
{
    var $img = false;
    var $isimg = false;
    if ($data.entities.media != undefined) {
        if ($data.entities.media.length > 0) {
            $img = $data.entities.media[0].media_url;
        }
    }
    //外部サービスの画像を表示
    if ($data.entities.urls != undefined) {
        if ($data.entities.urls > 0) {
            $isimg = false;
            $img = $data.entities.urls[0].expanded_url;
            //URLを「twitpic.com/show/full/ID」とすることで画像の直リンクが取得できる。
            //「full」を「thumb」にすればサムネイルサイズが取得できます。
            if($img.indexOf('twitpic') > -1){
                $isimg = true;
                $img = $img.replace(/twitpic.com/g,'twitpic.com/show/full');
                //$img = str_replace('twitpic.com/','twitpic.com/show/full/',$img);
            }
            if(strpos($img,'twipple') != 0){
                $isimg = true;
                $img = $img.replace(/twipple.jp/g,'twipple.jp/show/large');
                //$img = str_replace('twipple.jp/','twipple.jp/show/large/',$img);
            }
            if(strpos($img,'photozou') != 0){
                $isimg = true;
                $img = $img.replace('/photozou.jp\/photo\/show\/[0-9]*\//','photozou.jp/p/img/');
                //$img = preg_replace('/photozou.jp\/photo\/show\/[0-9]*\//','photozou.jp/p/img/',$img);
            }
            /*
            if(strpos($img,'instagram.com/p/') != 0){
                $instaurl = 'http://api.instagram.com/oembed?url=' . $img;
                $instajson = file_get_contents($instaurl);
                $json =  json_decode($instajson);
                if (property_exists($json,'url')) {
                    $isimg = true;
                    $img = $json->url;
                }
            }
            */
            if (!$isimg) {
                $img = false;
            }
        }
    }
    return $img;
}

function panelOpenInit()
{
    $( ".ui-page-active #settingopenbtn").unbind('click').click(function() {
        $('.ui-page-active #settingpanel').panel('open');
        var myDoughnut = new Chart(document.getElementById("accountchartcanvas").
            getContext("2d")).Doughnut(doughnutData);
        var ctx = document.getElementById("accountchartcanvas2").getContext("2d");
        new Chart(ctx).Radar(radarchartdata, {
            pointDot: false
        });
    });
    $( ".ui-page-active #friendopenbtn").unbind('click').click(function() {
        $('#fromdepoimg').attr('src', $('#myaccountimg').attr('src'));
        $('.ui-page-active #friendpanel').panel('open');
    });
}
