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
    <!-- ?php echo '<div><img src="' . $user['avator'] . '"><div class="badge">100d</div></img></div>' ? -->
    <div data-role="header" data-position="fixed">
        <a href="#" data-icon="gear" id="settingopenbtn">設定</a>
        <h1><?php echo $user['screen_name'] .'(' .(0 + $user['social_credit'] + $user['deposited_credit']) . 'd)' ?> さんのホーム</h1>
        <a href="#" data-icon="friend" id="friendopenbtn">友達</a>
    </div>
    <div data-role="panel" id="settingpanel" data-position="left" data-display="overlay">
        <!-- panel content goes here -->
        <div data-role="header">
            <h1>
                <?php echo '<div><img src="' . $user['avator'] . '"><div class="badge">' . (0 + $user['social_credit'] + $user['deposited_credit']) . 'd</div></img>' . $user['screen_name'] . '</div>' ?>
            </h1>
        </div>
        <ul data-role="listview" data-filter="true" data-filter-placeholder="Search timeline...">
            <li>持ってる団子の数<div class="ui-li-count"><?php echo $user['social_credit'] . 'd'; ?></div></li>
            <li>デポジット数<div class="ui-li-count"><?php echo $user['deposit_credit'] . 'd' ?></div></li>
            <li>非デポジット数<div class="ui-li-count"><?php echo $user['deposited_credit'] . 'd' ?></div>div></li>
        </ul>
        <a href="#" data-role="button" data-rel="close">閉じる</a>
    </div>
    <div role="main" class="ui-content">
      <ul data-role="listview" data-filter="true" data-filter-placeholder="Search timeline...">
          <?php
          echo '<li data-role="list-divider">タイムライン</li>';
          foreach ($timeline as $data)
          {
              echo '<li>'.'<img src="' . $data->user->profile_image_url . '"><div style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">' . $data->text . '</div>' . '<p style="text-overflow:ellipsis; overflow:hidden; ">' . $data->user->name . ' @' . $data->user->screen_name .'</p></li>';
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
                echo '<li class="friendli" screen_name="' . $data->screen_name . '"><a href="#depositAddDialog" data-rel="dialog" data-transition="pop"><div style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">' . $data->name . '</div><p style="text-overflow:ellipsis; overflow:hidden; ">' . $data->screen_name . '</p></a></li>';
                //$str = '<h2>' . $data->name . '</h2><p>' . $data->screen_name . '</p>';
                //echo '<li>' . Html::anchor('deposit/add', $str, array('data-rel'=>'dialog')) . '</li>';
            }
            ?>
        </ul>
    </div>
    <div data-role="footer" data-position="fixed">
        <div data-role="navbar" data-iconpos="left">
            <ul>
                <li><a href="#" class="ui-btn-active" data-icon="home">ホーム</a></li>
                <li><a href="#" data-icon="deposit">デポジット</a></li>
                <li><a href="#" data-icon="notify">お知らせ</a></li>
            </ul>
        </div>
    </div>
</div>
<div data-role="page" id="depositAddDialog">
    <div data-role="header">
        <h2>団子を友達にデポります</h2>
    </div>
    <div role="main" class="ui-content">
        <div id="depositaddscreenname" screen_name=""></div>
        <div class="ui-field-contain">
            <label for="slider-fill">デポジット数:</label>
            <input type="range" name="slider-fill" id="slider-fill" value="1" min="0" max="100" data-highlight="true">
        </div>
        <label for="textarea-a">メッセージ:</label>
        <textarea name="textarea" id="textarea-a">
I'm a basic textarea. If this is pre-populated with content, the height will be automatically adjusted to fit without needing to scroll. That is a pretty handy usability feature.
        </textarea>
        <?php echo Html::anchor('deposit/add', 'デポる', array('data-icon'=>'depoicon','data-role'=>'button','id'=>'depositaddbtn')); ?>
    </div>
</div>
</body>
</html>
