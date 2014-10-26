<div data-role="panel" id="settingpanel" data-position="left" data-display="overlay">
    <!-- panel content goes here -->
    <!-- ユーザヘッダーパネル -->
    <?php echo View::forge('scds/userheader2'); ?>
    <!-- ユーザチャートパネル -->
    <!--?php echo View::forge('scds/userchart'); ? -->
    <!-- ユーザ情報パネル -->
    <?php echo View::forge('scds/userinfo'); ?>
    <br>
    <a href="<?php echo URI::create('help'); ?>" data-role="button" data-rel="dialog">Fundangoとは?</a>
    <a href="<?php echo URI::create('twitterlogin/logout'); ?>" data-ajax="false" data-role="button" data-rel="">ログアウト</a>
    <a href="#" data-role="button" data-rel="close">閉じる</a>
    <a class="twitter-timeline" href="https://twitter.com/hashtag/fundango" data-widget-id="526166424037781504">#fundango件のツイート</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
