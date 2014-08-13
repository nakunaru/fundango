<div data-role="page" id="depositDelDialog">
    <div data-role="header">
        <h2>団子を友達からドローします</h2>
    </div>
    <div role="main" class="ui-content">
        <div id="depositdelscreenname"></div>
        <form action="<?php echo URI::create('deposit/del'); ?>" method="post" data-ajax=“false”>
            <input type="hidden" id="del_port4lio_id" name="del_port4lio_id" value="">
            <input type="hidden" id="del_to_screen_name" name="del_to_screen_name" value="">
            <input type="hidden" id="del_to_tuserid" name="del_to_tuserid" value="">
            <center>
            <img id="del_fromdepoimg" src=""><?php echo Asset::img('depoarrow.png',array('id'=>'depoarrowimg', 'class'=>'stretchRight'));  ?><?php echo '<img id="del_todepoimg" src="' . $user['avator'] . '">' ?>
            </center>
            <div class="ui-field-contain">
                <label for="del_deposit_num">デポ数:</label>
                <div id="del_deposit_num"></div>
            </div>
            <div class="ui-field-contain">
                <label for="del_capitalgain">CG:</label>
                <div id="del_capitalgain"></div>
            </div>
            <input id="depositdelsubmit" type="submit" value="ドロー">
        </form>
    </div>
</div>
