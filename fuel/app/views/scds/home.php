<!DOCTYPE html> 
<html>
<head>
    <title>Home</title>
    <?php echo View::forge('scds/htmlheader'); ?>
</head>
<body>
<!--ページ領域-->
<!--  -->
<div data-role="page" id="home"  data-title="Home" data-url="<?php echo URI::create('home'); ?>" >
    <!--ヘッダー領域-->
    <?php echo View::forge('scds/header'); ?>
    <div data-role="panel" id="settingpanel" data-position="left" data-display="overlay">
        <!-- panel content goes here -->
        <div data-role="header">
            <h1>
                <?php echo '<div><img src="' . $user['avator'] . '"><div class="badge">' . (0 + $user['social_credit'] + $user['deposited_credit']) . 'd</div></img>' . $user['screen_name'] . '</div>' ?>
            </h1>
        </div>
        <ul data-role="listview" data-filter="true" >
            <li>持ってる団子<div class="ui-li-count"><?php echo $user['social_credit'] . 'd'; ?></div></li>
            <li>友達へデポジット<div class="ui-li-count"><?php echo $user['deposit_credit'] . 'd' ?></div></li>
            <li>友達から被デポジット<div class="ui-li-count"><?php echo $user['deposited_credit'] . 'd' ?></div></li>
        </ul>
        <br>
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
                echo '<li class="friendli" screen_name="' . $data->screen_name . '" tuserid="' . $data->id . '"><a href="#depositAddDialog" data-rel="dialog" data-transition="pop"><div style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">' . $data->name . '</div><div class="ui-li-count">0d</div><p style="text-overflow:ellipsis; overflow:hidden; ">' . $data->screen_name . '</p></a></li>';
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
<!-- デポジット追加ダイアログ -->
<?php echo View::forge('scds/depositadddialog'); ?>
</body>
</html>
