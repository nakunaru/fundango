<!DOCTYPE html> 
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>W@tchMe! Login</title>
<?php echo Asset::css('themes/watchme.min.css'); ?>
<?php echo Asset::css('themes/jquery.mobile.icons.min.css'); ?>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
<?php echo Asset::css('sp.css'); ?>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script> 
<?php echo Asset::js('spinit.js'); ?>
</head>
<body>
<!--ページ領域-->
<div data-role="page" id="login"  data-title="Login">

  <!--ヘッダー領域-->
  <div data-role="header" data-position="fixed" data-fullscreen="true">
    <!--h3>自分株を交換しよう</h3 -->
    <div id="socialbuttons" class="clearfix">
        <div class="tweet"></div>
        <div class="facebook_like"></div>
        <?php echo Fuel::VERSION; ?>
        <?php echo $users[0]['bang'] ?>
        <?php echo $users[0]['name'] ?>
        <?php echo $users[0]['tosi'] ?>
        <?php echo "test" ?>
        <?php echo "test2" ?>
    </div>
  </div>

  <div role="main" class="ui-content">
    <br>
    <br>
    <br>
    <!-- center><img id="logintitle"  src="../../images/title.jpg"></center -->
    <center><?php echo Asset::img('title.jpg',array('id'=>'logintitle'));  ?></center>
    <div id="sociallogincontain" data-role="fieldcontain">
        <!-- a href="home.html" data-icon="twittericon" data-role="button" id="tweetloginbtn">Twitterでログイン</a -->
        <?php echo Html::anchor('index.php/twitterlogin', 'Twitterでログイン', array('data-icon'=>'twittericon','data-role'=>'button','id'=>'tweetloginbtn')); ?>
        <a href="#" data-icon="twittericon" data-role="button" id="fbloginbtn">Facebookでログイン</a>
    </div>
    <br>
    <br>
    <br>
  </div>

  <div data-role="footer" data-position="fixed" data-fullscreen="true">
    <h3>Copyright 2014, propra.co</h3>
  </div>

</div>
</body>
</html>
