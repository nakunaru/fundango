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