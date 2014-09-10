<div data-role="panel" id="settingpanel" data-position="left" data-display="overlay">
    <!-- panel content goes here -->
    <!-- ユーザヘッダーパネル -->
    <?php echo View::forge('scds/userheader'); ?>
    <!-- ユーザチャートパネル -->
    <?php echo View::forge('scds/userchart'); ?>
    <!-- ユーザ情報パネル -->
    <?php echo View::forge('scds/userinfo'); ?>
    <br>
    <a href="http://www.karamage.com/page-1810/" target="_blank" data-role="button" data-rel="dialog">fundangoとは?</a>
    <a href="<?php echo URI::create('twitterlogin/logout'); ?>" data-ajax="false" data-role="button" data-rel="">ログアウト</a>
    <a href="#" data-role="button" data-rel="close">閉じる</a>
</div>
