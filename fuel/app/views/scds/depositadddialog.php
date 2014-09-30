<div data-role="page" id="depositAddDialog">
    <div data-role="header">
        <h2>団子を友達にデポります</h2>
    </div>
    <div role="main" class="ui-content">
        <div id="depositaddscreenname"></div>
        <br>
        <form action="<?php echo URI::create('deposit/add'); ?>" method="post" data-ajax=“false”>
            <input type="hidden" id="to_screen_name" name="to_screen_name" value="">
            <input type="hidden" id="to_tuserid" name="to_tuserid" value="">
            <input type="hidden" id="to_image_url" name="to_image_url" value="">
            <input type="hidden" id="from_image_url" name="from_image_url" value="<?php echo $user['avator'] ?>">
            <input type="hidden" id="in_reply_to_status_id" name="in_reply_status_id" value="">
            <center>
            <img id="fromdepoimg" src=""><?php echo Asset::img('depoarrow.png',array('id'=>'depoarrowimg', 'class'=>'stretchRight'));  ?><img id="todepoimg" src="">
            </center>
            <div class="ui-field-contain">
                <label for="depositnum">デポる数:</label>
                <input type="range" name="depositnum" id="depositnum" value="1" min="1" max="<?php echo $user['social_credit'] - $user['deposit_credit'] ?>" data-highlight="true">
            </div>
            <div class="ui-field-contain">
                <label for="message">メッセージ:</label>
                <textarea name="message" id="message"></textarea>
            </div>
            <div data-role="fieldcontain">
                <!--input type="checkbox" name="tweetflipswitch" id="tweetflipswitch" data-role="flipswitch" -->
                <label for="tweetflipswitch">シェア:</label>
                <select name="tweetflipswitch" id="tweetflipswitch" data-role="flipswitch">
                    <option value="off">Off</option>
                    <option selected="selected" value="on">On</option>
                </select>
            </div>
            <input id="depositaddsubmit" type="submit" value="デポる" data-ajax="false">
        </form>
    </div>
</div>
