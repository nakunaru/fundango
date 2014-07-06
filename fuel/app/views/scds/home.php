<!DOCTYPE html> 
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>W@tchMe! Home</title>
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
<div data-role="page" id="home"  data-title="Home">

  <!--ヘッダー領域-->
  <div data-role="header" data-position="fixed">
    <h1>ホーム</h1>
  </div>
  <div data-role="panel" id="howtopanel" data-position="left" data-display="overlay">
    <!-- panel content goes here -->
    How to
  </div>
  <div role="main" class="ui-content">
  タイムライン
      <?php echo $user['screen_name'] ?><br>
      <?php echo $user['followers_count'] ?><br>
      <?php echo $timeline[0]['text'] ?><br>
  </div>

  <div data-role="footer" data-position="fixed">
    <div data-role="navbar">
        <ul>
            <li><a href="#">ホーム</a></li>
            <li><a href="#">DANGO</a></li>
            <li><a href="#">メッセージ</a></li>
            <li><a href="#">通知</a></li>
            <li><a href="#">設定</a></li>
        </ul>
    </div>
  </div>

</div>
</body>
</html>
