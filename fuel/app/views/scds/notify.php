<!DOCTYPE html>
<html>
<head>
    <title>通知</title>
    <?php echo View::forge('scds/htmlheader'); ?>
</head>
<body>
<!--ページ領域-->
<!--  -->
<div data-role="page" id="notify"  data-title="notify" data-url="<?php echo URI::create('notify'); ?>" >
    <!--ヘッダー領域-->
    <?php echo View::forge('scds/header2'); ?>
    <!-- 設定パネル -->
    <?php echo View::forge('scds/settingpanel'); ?>
    <!-- 通知リスト -->
    <?php echo View::forge('scds/notifylist'); ?>
    <!-- 友達パネル -->
    <?php echo View::forge('scds/friendpanel'); ?>
    <!-- footer -->
    <?php echo View::forge('scds/footer'); ?>
</div>
<!-- デポジット追加ダイアログ -->
<?php echo View::forge('scds/depositadddialog'); ?>
</body>
</html>
