<div data-role="footer" data-position="fixed">
    <div data-role="navbar" data-iconpos="left">
        <ul>
            <!-- class="ui-btn-active" -->
            <li><a id="footerhome" href="<?php echo URI::create('home'); ?>" data-transition="flip" data-ajax="false">ホーム</a></li>
            <li><a id="footeruser" href="<?php echo URI::create('userlist'); ?>" data-transition="flip" data-ajax="false">ユーザ</a></li>
            <li><a id="footerdeposit" href="<?php echo URI::create('deposit'); ?>" data-transition="flip"  data-ajax="false">デポ</a></li>
            <!-- li><a id="footerboard" href="<?php echo URI::create('board'); ?>" data-transition="flip" data-ajax="false">ボード</a></li -->
            <li><a id="footernotify" href="<?php echo URI::create('notify'); ?>" data-transition="flip" data-ajax="false">通知</a></li>
        </ul>
    </div>
</div>
