<!DOCTYPE html>
<html>
<head>
    <title>fundango</title>
    <?php echo View::forge('scds/htmlheader'); ?>
    <!-- script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-23784522-2', 'auto');
        ga('send', 'pageview');

    </script -->
</head>
<body>
<!--ページ領域-->
<div data-role="page" id="login"  data-title="Fundango Login" class="colorful">

  <!--ヘッダー領域-->
  <div data-role="header" data-position="fixed" data-fullscreen="true">
    <!--h3>自分株を交換しよう</h3 -->
    <div id="socialbuttons" class="clearfix">
        <div class="tweet"></div>
        <div class="facebook_like"></div>
    </div>
  </div>

  <div role="main" class="ui-content">
    <br>
    <br>
    <br>
      <center>
          <h1 class="fadeIn">Fundangoは、みんなが"上場"している社会を実現します</h1>
          <p class="description fadeIn">Fundangoの名前の由来は、「私は○○さんの"ファン"です」の"fun"と"dango"=団子とを掛けあわせた言葉です。<br>このサービスにログインするためにはTwitterアカウントが必要です。</p>
          <center><div><?php echo Asset::img('nyandango_128.png',array('id'=>'loginnyandango', 'class'=>'tossing'));  ?></div></center>
          <h1>日経平均だんご株価</h1>
          <h1><div id="odometernikkei" class="odometer" >00000</div>d</h1>
      </center>
    <!-- center><img id="logintitle"  src="../../images/title.jpg"></center -->
    <center><div><?php echo Asset::img('fundango_logo_mini.jpg',array('id'=>'logintitle', 'class'=>'hatch'));  ?></div></center>
    <div id="sociallogincontain" data-role="fieldcontain">
        <div data-role="fieldcontain">
            <!-- a href="home.html" data-icon="twittericon" data-role="button" id="tweetloginbtn">Twitterでログイン</a -->
            <center><a href="<?php echo URI::create('help'); ?>">Fundangoとは？</a></center>
            <?php echo Html::anchor('twitterlogin/login', 'Twitterでログイン', array( 'data-role'=>'button','id'=>'tweetloginbtn', 'data-inset'=>'true', 'data-ajax'=>'false', 'class'=>'pulse')); ?>
            <!--a href="#" class="pullUp" data-icon="facebookicon" data-role="button" id="fbloginbtn">Facebookでログイン</a -->
        </div>
    </div>
    <br>
    <br>
    <br>
    <?php echo View::forge('scds/userrankinglist'); ?>
  </div>

  <div data-role="footer" data-position="fixed" data-fullscreen="true">
    <h3>Copyright 2014, Masaaki Kakimoto</h3>
  </div>

</div>
</body>
</html>
