<!DOCTYPE html> 
<html>
<head>
    <title>Home</title>
    <?php echo View::forge('scds/htmlheader'); ?>
</head>
<body>
<!--ページ領域-->
<!--  -->
<div data-role="page" id="home"  data-title="Home" data-url="<?php echo URI::create('home'); ?>" >
    <!--ヘッダー領域-->
    <?php echo View::forge('scds/header'); ?>
    <!-- 設定パネル -->
    <?php echo View::forge('scds/settingpanel'); ?>
    <!-- タイムライン -->
    <?php echo View::forge('scds/timeline'); ?>
    <!-- 友達パネル -->
    <?php echo View::forge('scds/friendpanel'); ?>

    <?php echo '<div class="has_unread" hasunread="' . $has_unread . '"></div>'; ?>
    <!-- footer -->
    <?php echo View::forge('scds/footer'); ?>
</div>
<!-- デポジット追加ダイアログ -->
<?php echo View::forge('scds/depositadddialog'); ?>
<?php echo View::forge('scds/port4liodiv'); ?>
</body>
</html>
