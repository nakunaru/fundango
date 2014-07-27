<div data-role="page" id="depositAddDialog">
    <div data-role="header">
        <h2>団子を友達にデポります</h2>
    </div>
    <div role="main" class="ui-content">
        <div id="depositaddscreenname"></div>
        <form action="<?php echo URI::create('deposit/add'); ?>" method="post" data-ajax=“false”>
            <input type="hidden" id="to_screen_name" name="to_screen_name" value="">
            <input type="hidden" id="to_tuserid" name="to_tuserid" value="">
            <?php echo Asset::img('depoarrow.jpg',array('id'=>'depoarrowimg', 'class'=>'stretchRight'));  ?><?php echo Asset::img('depoarrow.jpg',array('id'=>'depoarrowimg', 'class'=>'stretchRight'));  ?>
            <div class="ui-field-contain">
                <label for="slider-fill">デポジット数:</label>
                <input type="range" name="depositnum" id="depositnum" value="1" min="0" max="100" data-highlight="true">
            </div>
            <div class="ui-field-contain">
                <label for="textarea-a">メッセージ:</label>
                <textarea name="message" id="message"></textarea>
            </div>
            <input id="depositaddsubmit" type="submit" value="デポる">
        </form>
    </div>
</div>
