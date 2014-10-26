<div data-role="header">
    <a href="" data-rel="back">戻る</a>
    <h1>
        <?php echo '<img id="myaccountimg" src="'
            . $user['avator'] . '">'
                . '</img><div>' . $user['screen_name'] . '</div>' ?>
        現値:<div id="odometer2" class="odometer" credit="<?php echo '' .(0 + $user['social_credit'] + $user['deposited_credit']); ?>">00000</div>d<br>
    </h1>
    <center><p><?php echo $user['description'] ?></p></center>
    <center><p>閲覧された回数：<?php echo $user['page_count'] ?>回</p></center>
</div>
