<ul data-role="listview" >
    <li>ランキング <?php echo $rank['user_rank'] ?>/<?php echo $rank['all_users_count'] ?></li>
    <li>団子のカラー 青</li>
    <li>持ってる団子の数<div class="ui-li-count"><?php echo $user['social_credit'] . 'd'; ?></div></li>
    <li>デポジット可能数<div id="account_enabled_deposit_credit" credit="<?php echo $user['social_credit'] - $user['deposit_credit']?>" class="ui-li-count"><?php echo $user['social_credit'] - $user['deposit_credit'] . 'd' ?></div></li>
    <li>友達へデポジット数<div class="ui-li-count"><?php echo $user['deposit_credit'] . 'd' ?></div></li>
    <li>友達から被デポジット数<div class="ui-li-count"><?php echo $user['deposited_credit'] . 'd' ?></div></li>
</ul>
