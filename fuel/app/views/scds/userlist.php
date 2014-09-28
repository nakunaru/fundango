<!DOCTYPE html>
<html>
<head>
    <title>ユーザ</title>
    <?php echo View::forge('scds/htmlheader'); ?>
</head>
<body>
<!--ページ領域-->
<!--  -->
<div data-role="page" id="userlist"  data-title="userlist" data-url="<?php echo URI::create('userlist'); ?>" >
    <!--ヘッダー領域-->
    <?php echo View::forge('scds/header2'); ?>
    <!-- 設定パネル -->
    <?php echo View::forge('scds/settingpanel'); ?>
    <!-- ユーザリスト -->
    <?php echo View::forge('scds/userlist2'); ?>
    <!-- 友達パネル -->
    <?php echo View::forge('scds/friendpanel'); ?>
    <!-- footer -->
    <?php echo View::forge('scds/footer'); ?>
</div>
<!-- デポジット追加ダイアログ -->
<?php echo View::forge('scds/depositadddialog'); ?>
</body>
</html>
