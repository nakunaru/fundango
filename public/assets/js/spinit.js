
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

    //日経平均を出す
    var creditlist = $('.total_credit');
    var total_credit = 0;
    for (var i=0; i<creditlist.length; i++) {
        if (i == 0) {
            continue;
        }
        var credit = 0 + $(creditlist[i]).attr('total_credit');
        total_credit = total_credit + credit;
    }
    total_credit = total_credit;
    setTimeout(function(){
        odometernikkei.innerHTML = String(parseInt(total_credit));
    }, 1000);
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

    //ポートフォリオをタップした時、ドローダイアログを開く
    $('.ui-page-active .port4lioli').unbind('click').click(function(){
        var port4lio_id = $(this).attr('port4lio_id');
        var screen_name = $(this).attr('screen_name');
        var tuserid = $(this).attr('to_tuserid');
        var to_img_url = $(this).attr('to_img_url');
        var deposit_num = $(this).attr('deposit_num');
        var cg = $(this).attr('cg');
        $('#del_fromdepoimg').attr("src", to_img_url);
        $('#del_deposit_num').text(deposit_num);
        $('#del_capitalgain').text(cg);
        $('#del_port4lio_id').val(port4lio_id);
        $('#del_to_tuserid').val(tuserid);
    });
});

/**
 * デポジットダイアログを開く
 * @param tuserid
 * @param screen_name
 * @param toimg
 */
function openDepositAddDialog(tuserid, screen_name, toimg, timelineid) {
    $('#fromdepoimg').attr('src', $('#myaccountimg').attr('src'));
    $('#depositaddscreenname').attr('screen_name',screen_name).text(screen_name + 'さんに私の団子を預けます');
    $('#to_screen_name').val(screen_name);
    $('#to_tuserid').val(tuserid);
    $('#message').val("");
    $('#todepoimg').attr('src', toimg);
    $('#to_image_url').val(toimg);
    if (timelineid != undefined) {
        $('#in_reply_to_status_id').val(timelineid);
    } else {
        $('#in_reply_to_status_id').val("");
    }
    var enabled_deponum = $('#account_enabled_deposit_credit').attr('credit');
    enabled_deponum = Number(enabled_deponum);

    //デポジットが重複していないかチェックする
    var isduplicate = false;
    /*
    var port4liolistdiv = $('.port4liolistdiv');
    for (var i=0; i<port4liolistdiv.length; i++) {
        if (tuserid == $(port4liolistdiv[i]).text()) {
            isduplicate = true;
            break;
        }
    }
    */

    if (enabled_deponum <= 0 || isduplicate) {
        if (enabled_deponum <= 0) {
            alert('デポジット可能な団子がありません＞＜');
        } else {
            alert('すでにその人にデポジットしています。ドローしてください');
        }
        //$('#depositAddDialog')
        setTimeout(function(){
            $('.ui-dialog').dialog('close');
        }, 1000);
        return;
    }
}

/*
$(document).on( "pageinit", "#help", function( event ) {
    var slider = $.fn.fsvs({
        speed : 5000,
        bodyID : 'fsvs-body',
        selector : '> .slide',
        mouseSwipeDisance : 40,
        afterSlide : function(){},
        beforeSlide : function(){},
        endSlide : function(){},
        mouseWheelEvents : true,
        mouseDragEvents : true,
        touchEvents : true,
        arrowKeyEvents : true,
        pagination : true,
        nthClasses : false,
        detectHash : true
    });
    //slider.slideUp();
    //slider.slideDown();
    //slider.slideToIndex( index );
});
*/

$(document).on( "pageshow", "#user", function( event ) {
    setTimeout(function(){
        odometer2.innerHTML = $('.ui-page-active #odometer2').attr('credit');
    }, 1000);
});
//$(document).on( "pageinit", "#home", function( event ) {
$(document).on( "pageshow", "#home", function( event ) {
    var aaa = "";
    //var wow = new WOW();
    //wow.init();
    //new WOW().init();
    panelOpenInit();

    setTimeout(function(){
        odometer.innerHTML = $('.ui-page-active #odometer').attr('credit');
    }, 1000);


    $('#footerhome').addClass('ui-btn-active');


    $('.ui-page-active .friendli').unbind('click').click(function(){
        var screen_name = $(this).attr('screen_name');
        var tuserid = $(this).attr('tuserid');
        var toimg = $(this).attr('image_url');
        openDepositAddDialog(tuserid, screen_name, toimg);
    });

    //最初の呼び出し
    getTimeline();

    if (timeline_timer != 0) {
        clearInterval(timeline_timer);
    }
    //タイムライン取得を６０秒間隔で行う
    timeline_timer = setInterval("getTimeline()",60000);
    //}
    //未読の通知があるかどうか
    var has_unread = $('.has_unread');
    if (has_unread.length > 0) {
        //フッターの通知の色を変える
        $('#footernotify').css('color', '#ff0000');

        showToastMessage('新着通知があります');
    }
});

/**
 * URLを自動リンクする
 */
function setUrlLink() {
    //URLを自動リンクする
    //var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
    //$('#timelinelist').html($('#timelinelist').html().replace(exp,"<a href='$1'>$1</a>"));

    $('.currli .timelinetext').each(function(){
        $(this).html( $(this).html().replace(/((http|https|ftp):\/\/[\w?=&.\/-;#~%-]+(?![\w\s?&.\/;#~%"=-]*>))/g, '<a target="_blank" href="$1">$1</a> '));
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
        $(this).html(_html).attr('target','_blank');
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
                var str = '<li class="timelineli currli" timelineid="' + $data.id_str + '" >'
                    + '<img class="slideRight" src="' + $data.user.profile_image_url
                    + '"><div class="timelinetext slideLeft" style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">'
                    + $data.text + '</div>'
                    + '<p class="ui-li-aside timelinedate">' + $data.datestr + '</p>'
                    + '<p style="text-overflow:ellipsis; overflow:hidden; ">'
                    + $data.user.name + ' @' + $data.user.screen_name + '</p>'
                    + '<p class="ui-li-count">' + $data.credit + 'd</p>'
                    //+ '<button class="timelinedepositaddbutton" value="デポる" data-inline="true"></button>'
                    + '<div class="depositaddbuttondiv isnew" timelineid="' + $data.id_str + '" tuserid="' + $data.user.id + '" screen_name="' + $data.user.screen_name + '" image_url="' + $data.user.profile_image_url + '"></div>'
                    //+ '<a href="#">デポる</a>'
                    ;
                //$(timelineul).prepend(str);
                var img = getImageUrlLink($data);
                if (img) {
                   str += '<img class="slideUp timelineimg" src="' + img + '">';
                }
                str += '</li>';
                $(timelineultmp).append(str);
            }
            $(timelineul).prepend($(timelineultmp).html());
            $(timelineultmp).html('');
            $(timelineul).prepend('<li class="timelinedivider" since_id="' + since_id + '" data-role="list-divider">タイムライン</li>');
            $(timelineul).listview('refresh');

            //デポジットボタン作る
            $('.depositaddbuttondiv.isnew').click(function() {
                var screen_name = $(this).attr('screen_name');
                var tuserid = $(this).attr('tuserid');
                var toimg = $(this).attr('image_url');
                var timelineid = $(this).attr('timelineid');
                openDepositAddDialog(tuserid, screen_name, toimg, timelineid);
            });
            $('.depositaddbuttondiv.isnew').removeClass('isnew').append('<a href="#depositAddDialog" data-rel="dialog" data-transition="pop">デポる</a>');
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
        /*
        var myDoughnut = new Chart(document.getElementById("accountchartcanvas").
            getContext("2d")).Doughnut(doughnutData);
        var ctx = document.getElementById("accountchartcanvas2").getContext("2d");
        new Chart(ctx).Radar(radarchartdata, {
            pointDot: false
        });
        */
        setTimeout(function(){
            odometer2.innerHTML = $('.ui-page-active #odometer2').attr('credit');
        }, 1000);
    });
    $( ".ui-page-active #friendopenbtn").unbind('click').click(function() {
        $('#fromdepoimg').attr('src', $('#myaccountimg').attr('src'));
        $('.ui-page-active #friendpanel').panel('open');
    });
}

function showToastMessage(message) {
    var box = $("<div class='ui-loader ui-overlay-shadow ui-body-a ui-corner-all'>"
        + message + "</div>")
        .css({
            "padding": "7px 25px 7px 25px",
            "display": "block",
            "opacity": 0.8
        })
        .appendTo($.mobile.pageContainer);

    var left = Math.floor(($(window).width() - box.width()) / 2);
    box.css({
        "top": $(window).scrollTop() + 100,
        "left": left
    })
        .delay(3500)
        .fadeOut(400, function () {
            $(this).remove();
        });
};