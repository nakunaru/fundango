<!DOCTYPE html> 
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>fundango</title>
<?php echo Asset::css('themes/watchme.min.css'); ?>
<?php echo Asset::css('themes/jquery.mobile.icons.min.css'); ?>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
<?php echo Asset::css('animations.css'); ?>
<?php echo Asset::css('sp.css'); ?>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script> 
<?php echo Asset::js('spinit.js'); ?>
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
<div data-role="page" id="login"  data-title="Login" class="colorful">

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
    <!-- center><img id="logintitle"  src="../../images/title.jpg"></center -->
    <center><div><?php echo Asset::img('fundango_logo_mini.jpg',array('id'=>'logintitle', 'class'=>'hatch'));  ?></div></center>
      <center><div><?php echo Asset::img('nyandango2_512.png',array('id'=>'loginnyandango', 'class'=>'hatch'));  ?></div></center>
    <div id="sociallogincontain" data-role="fieldcontain">
        <div data-role="fieldcontain">
            <!-- a href="home.html" data-icon="twittericon" data-role="button" id="tweetloginbtn">Twitterでログイン</a -->
            <center><a href="http://www.karamage.com/page-1810/">Fundangoとは？</a></center>
            <?php echo Html::anchor('twitterlogin/login', 'Twitterでログイン', array( 'data-role'=>'button','id'=>'tweetloginbtn', 'data-inset'=>'true', 'data-ajax'=>'false')); ?>
            <!--a href="#" class="pullUp" data-icon="facebookicon" data-role="button" id="fbloginbtn">Facebookでログイン</a -->
        </div>
    </div>
    <br>
    <br>
    <br>
  </div>

  <div data-role="footer" data-position="fixed" data-fullscreen="true">
    <h3>Copyright 2014, Masaaki Kakimoto</h3>
  </div>

</div>
</body>
</html>
