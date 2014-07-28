<div data-role="page" id="depositDelDialog">
    <div data-role="header">
        <h2>団子を友達からドローします</h2>
    </div>
    <div role="main" class="ui-content">
        <div id="depositdelscreenname"></div>
        <form action="<?php echo URI::create('deposit/add'); ?>" method="post" data-ajax=“false”>
            <input type="hidden" id="del_port4lio_id" name="del_port4lio_id" value="">
            <input type="hidden" id="del_to_screen_name" name="del_to_screen_name" value="">
            <input type="hidden" id="del_to_tuserid" name="del_to_tuserid" value="">
            <center>
            <img id="fromdepoimg" src=""><?php echo Asset::img('depoarrow.png',array('id'=>'depoarrowimg', 'class'=>'stretchRight'));  ?><img id="todepoimg" src="">
            </center>
            <div class="ui-field-contain">
                <label for="slider-fill">デポジット数:</label>
                <div id="del_deposit_num"></div>
            </div>
            <div class="ui-field-contain">
                <label for="textarea-a">キャピタルゲイン:</label>
                <div id="del_capitalgain"></div>
            </div>
            <input id="depositdelsubmit" type="submit" value="ドロー">
        </form>
    </div>
</div>
