<!DOCTYPE html>
<html>
<head>
    <title>デポジット</title>
    <?php echo View::forge('scds/htmlheader'); ?>
</head>
<body>
<!--ページ領域-->
<!--  -->
<div data-role="page" id="deposit"  data-title="deposit" data-url="<?php echo URI::create('deposit'); ?>" >
    <!--ヘッダー領域-->
    <?php echo View::forge('scds/header'); ?>
    <!-- 設定パネル -->
    <?php echo View::forge('scds/settingpanel'); ?>
    <!-- ポートフォリオ -->
    <?php echo View::forge('scds/depositlist'); ?>
    <!-- 友達パネル -->
    <?php echo View::forge('scds/friendpanel'); ?>
    <!-- footer -->
    <?php echo View::forge('scds/footer'); ?>
</div>
<!-- デポジット追加ダイアログ -->
<?php echo View::forge('scds/depositadddialog'); ?>
<!-- デポジット削除ダイアログ -->
<?php echo View::forge('scds/depositdeldialog'); ?>
</body>
</html>
