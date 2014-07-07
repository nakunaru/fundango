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
        <a href="#" data-icon="gear" id="settingopenbtn">アカウント</a>
        <h1>
          <?php echo '<img src="' . $user['avator'] . '">' ?>
          <?php echo $user['screen_name'] ?> さんのホーム
        </h1>
        <a href="#" data-icon="friend" id="friendopenbtn">友達</a>
    </div>
    <div data-role="panel" id="settingpanel" data-position="left" data-display="overlay">
        <!-- panel content goes here -->
        <a href="#" data-rel="close">閉じる</a>
    </div>
    <div role="main" class="ui-content">
      <ul data-role="listview">
          <?php
          foreach ($timeline as $data)
          {
              echo '<li>'.$data->text.'<img src="' . $data->user->profile_image_url . '">' . $data->user->name . '</a></li>';
          }
          ?>
      </ul>
    </div>

    <div data-role="panel" id="friendpanel" data-position="right" data-display="overlay">
        <!-- panel content goes here -->
        <ul data-role="listview">
        </ul>
    </div>
    <div data-role="footer" data-position="fixed">
        <div data-role="navbar">
            <ul>
                <li><a href="#" data-icon="home">ホーム</a></li>
                <li><a href="#" data-icon="dango">団子</a></li>
                <li><a href="#" data-icon="message">メッセージ</a></li>
                <li><a href="#" data-icon="notify">通知</a></li>
                <li><a href="#" data-icon="setting">設定</a></li>
            </ul>
        </div>
    </div>

</div>
</body>
</html>
