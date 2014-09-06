<div data-role="panel" id="settingpanel" data-position="left" data-display="overlay">
    <!-- panel content goes here -->
    <div data-role="header">
        <h1>
            <?php echo '<div><img id="myaccountimg" src="'
                . $user['avator'] . '"><div class="badge">'
                . (0 + $user['social_credit']
                    + $user['deposited_credit']) . 'd</div></img>' . $user['screen_name'] . '</div>' ?>
        </h1>
    </div>
    <center>
        <canvas id="accountchartcanvas" height="150" width="150"></canvas>
        <br>
        <canvas id="accountchartcanvas2" height="200" width="200"></canvas>
    </center>
    <!-- ユーザ情報パネル -->
    <?php echo View::forge('scds/userinfo'); ?>
    <br>
    <a href="#" data-role="button" data-rel="dialog">fundangoとは?</a>
    <a href="<?php echo URI::create('twitterlogin/logout'); ?>" data-ajax="false" data-role="button" data-rel="">ログアウト</a>
    <a href="#" data-role="button" data-rel="close">閉じる</a>
</div>
