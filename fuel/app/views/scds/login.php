<!DOCTYPE html>
<html class="login">
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!--ページ領域-->
<div data-role="page" id="login"  data-title="Fundango Login" class="">

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
      <center>
          <h2 class="">Fundangoは、みんなが"上場"している社会を実現します</h2>
          <br>
          <p class="description">名前の由来は、「私は○○さんの"ファン"です」の"fun"と"dango"=団子とを掛けあわせた言葉です。</p>
          <p class="description">このサービスの目的は、<b>個人の信用を見える化する</b>ことです。 誰が誰に対して信用しているのか、それを数値やグラフとして表示します。</p>
          <br>
          <h3>現在の日経平均Dango株価</h3>
          <h1><div id="odometernikkei" class="odometer" >0724545</div>d</h1>
      </center>
    <!-- center><img id="logintitle"  src="../../images/title.jpg"></center -->
    <!-- center><div><?php echo Asset::img('fundango_logo_mini.jpg',array('id'=>'logintitle', 'class'=>'hatch'));  ?></div></center -->
      <center>
          <?php echo Html::anchor('twitterlogin/login', 'FundangoにTwitterでログインする!', array( 'data-role'=>'button','id'=>'tweetloginbtn', 'data-inline'=>'true', 'data-ajax'=>'false', 'class'=>'pulse')); ?>
      </center>
      <br>
    <div id="sociallogincontain" data-role="fieldcontain">
        <div data-role="fieldcontain">
            <!-- a href="home.html" data-icon="twittericon" data-role="button" id="tweetloginbtn">Twitterでログイン</a -->
            <!--a href="#" class="pullUp" data-icon="facebookicon" data-role="button" id="fbloginbtn">Facebookでログイン</a -->
            <center>
                <p class="description">このサービスにログインするためにはTwitterアカウントが必要です。</p>
                <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            <br>
                <center><div><?php echo Asset::img('nyandango_128.png',array('id'=>'loginnyandango', 'class'=>'tossing'));  ?></div></center>
            <br>
            <p class="description fadeIn">このサービスは<a href="https://twitter.com/kara_mage" target="_blank">@kara_mage(柿本匡章)</a>が運営しています。<br>からまげについて詳しく知りたい方は下記に今すぐアクセス!</p>
            <a data-role="button" data-inline="true" data-mini="true" href="http://www.karamage.com/" target="_blank">http://www.karamage.com</a>
            <br>
            <a data-role="button" data-inline="true" data-mini="true" target="_blank" href="<?php echo URI::create('help'); ?>">Fundangoとは？</a>
            <br>
            <div class="fb-like-box" data-href="https://www.facebook.com/fundango.jp" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
            </center>
        </div>
    </div>
      <iframe src="//www.facebook.com/plugins/follow?href=https%3A%2F%2Fwww.facebook.com%2Fkaramage.umauma&amp;layout=standard&amp;show_faces=true&amp;colorscheme=light&amp;width=450&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
    <?php echo View::forge('scds/userrankinglist'); ?>

  </div>

  <div data-role="footer" data-position="fixed" data-fullscreen="true">
    <h3><div class="fb-like" expr:data-href="data:blog.url" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"/></h3>
  </div>

</div>
</body>
</html>
