<!DOCTYPE html>
<html>
<head>
    <title>ユーザ情報</title>
    <?php echo View::forge('scds/htmlheader'); ?>
</head>
<body>
<!--ページ領域-->
<!--  -->
<div data-role="page" id="user"  data-title="user" data-url="<?php echo URI::create('user'); ?>" >
    <!-- ユーザ情報 -->
    <!-- ユーザヘッダーパネル -->
    <?php echo View::forge('scds/userheader'); ?>
    <!-- ユーザ情報パネル -->
    <?php echo View::forge('scds/userinfo'); ?>
</div>
<!-- デポジット追加ダイアログ -->
<?php echo View::forge('scds/depositadddialog'); ?>
<!-- デポジット削除ダイアログ -->
<?php echo View::forge('scds/depositdeldialog'); ?>
</body>
</html>
