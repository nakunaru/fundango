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
        <a href="#" data-icon="gear" id="settingopenbtn">設定</a>
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
      <ul data-role="listview" data-filter="true" data-filter-placeholder="Search timeline...">
          <?php
          echo '<li data-role="list-divider">タイムライン</li>';
          foreach ($timeline as $data)
          {
              echo '<li><a href="#">'.'<img src="' . $data->user->profile_image_url . '"><h2>' . $data->text . '</h2>' . '<p>' . $data->user->name . ' @' . $data->user->screen_name .'</p></a></li>';
          }
          ?>
      </ul>
    </div>

    <div data-role="panel" id="friendpanel" data-position="right" data-display="overlay">
        <!-- panel content goes here -->
        <ul data-role="listview" data-filter="true" data-filter-placeholder="Search friends...">
            <?php
            echo '<li data-role="list-divider">友達</li>';
            foreach ($followers as $data)
            {
                echo '<li class="friendli" screen_name="' . $data->screen_name . '"><a href=""><h2>' . $data->name . '</h2><p>' . $data->screen_name . '</p></a></li>';
                //$str = '<h2>' . $data->name . '</h2><p>' . $data->screen_name . '</p>';
                //echo '<li>' . Html::anchor('deposit/add', $str, array('data-rel'=>'dialog')) . '</li>';
            }
            ?>
        </ul>
    </div>
    <div data-role="footer" data-position="fixed">
        <div data-role="navbar">
            <ul>
                <li><a href="#" data-icon="home">ホーム</a></li>
                <li><a href="#" data-icon="dango">団子</a></li>
                <li><a href="#" data-icon="message">メッセージ</a></li>
                <li><a href="#" data-icon="notify">通知</a></li>
            </ul>
        </div>
    </div>
</div>
<div data-role="page" id="dialogPage">
    <div data-role="header">
        <h2>Dialog</h2>
    </div>
    <div role="main" class="ui-content">
        <p>I am a dialog</p>
    </div>
</div>
</body>
</html>
