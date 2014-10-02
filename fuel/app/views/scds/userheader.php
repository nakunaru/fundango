<div data-role="header">
    <h1>
        <?php echo '<img id="myaccountimg" src="'
            . $user['avator'] . '">'
                . '</img><div>' . $user['screen_name'] . '</div>' ?>
        現値:<div id="odometer2" class="odometer" credit="<?php echo '' .(0 + $user['social_credit'] + $user['deposited_credit']); ?>">00000</div>d
    </h1>
</div>
