<!DOCTYPE html>
<html>
<head>
    <title>ボード</title>
    <?php echo View::forge('scds/htmlheader'); ?>
</head>
<body>
<!--ページ領域-->
<!--  -->
<div data-role="page" id="board"  data-title="board" data-url="<?php echo URI::create('board'); ?>" >
    <!--ヘッダー領域-->
    <?php echo View::forge('scds/header'); ?>
    <!-- 設定パネル -->
    <?php echo View::forge('scds/settingpanel'); ?>
    <!-- 株価ボード -->
    <?php echo View::forge('scds/boardlist'); ?>
    <!-- 友達パネル -->
    <?php echo View::forge('scds/friendpanel'); ?>
    <!-- footer -->
    <?php echo View::forge('scds/footer'); ?>
</div>
<!-- デポジット追加ダイアログ -->
<?php echo View::forge('scds/depositadddialog'); ?>
</body>
</html>
