<ul data-role="listview" >
    <li>ランキング <?php echo $rank['user_rank'] ?>/<?php echo $rank['all_users_count'] ?></li>
    <!-- li>dangoのカラー 青</li -->
    <li>持ってるdango数<div class="ui-li-count"><?php echo $user['social_credit'] . 'd'; ?></div></li>
    <li>残dango<div id="account_enabled_deposit_credit" credit="<?php echo $user['social_credit'] - $user['deposit_credit']?>" class="ui-li-count"><?php echo $user['social_credit'] - $user['deposit_credit'] . 'd' ?></div></li>
    <li>デポった数<div class="ui-li-count"><?php echo $user['deposit_credit'] . 'd' ?></div></li>
    <li>デポられ数<div class="ui-li-count"><?php echo $user['deposited_credit'] . 'd' ?></div></li>
</ul>
<a data-role="button" href="https://twitter.com/<?php echo $user['screen_name'] ?>" target="_blank">Twitterのページ</a>
<br>
<a class="twitter-timeline" href="https://twitter.com/<?php echo $user['screen_name'] ?>" data-widget-id="526283876742615042">@<?php echo $user['screen_name'] ?> からのツイート</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>