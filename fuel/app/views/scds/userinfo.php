<ul data-role="listview" >
    <li>ランキング <?php echo $rank['user_rank'] ?>/<?php echo $rank['all_users_count'] ?></li>
    <li>dangoのカラー 青</li>
    <li>持ってるdango数<div class="ui-li-count"><?php echo $user['social_credit'] . 'd'; ?></div></li>
    <li>残dango<div id="account_enabled_deposit_credit" credit="<?php echo $user['social_credit'] - $user['deposit_credit']?>" class="ui-li-count"><?php echo $user['social_credit'] - $user['deposit_credit'] . 'd' ?></div></li>
    <li>デポった数<div class="ui-li-count"><?php echo $user['deposit_credit'] . 'd' ?></div></li>
    <li>デポられ数<div class="ui-li-count"><?php echo $user['deposited_credit'] . 'd' ?></div></li>
</ul>
