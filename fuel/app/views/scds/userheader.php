<div data-role="header">
    <h1>
        <?php echo '<div><img id="myaccountimg" src="'
            . $user['avator'] . '"><div class="badge">'
            . (0 + $user['social_credit']
                + $user['deposited_credit']) . 'd</div></img>' . $user['screen_name'] . '</div>' ?>
    </h1>
</div>
