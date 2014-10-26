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
    <div id="tabs" data-role="tabs">
        <div data-role="navbar">
            <ul>
                <li><a href="#userlist2" class="ui-btn-active">ユーザ一覧</a></li>
                <li><a href="#userrankinglist">ランキング</a></li>
            </ul>
        </div>
        <!--1パネル（コンテンツ領域）を準備-->
        <?php echo View::forge('scds/userlist2'); ?>
        <?php echo View::forge('scds/userrankinglist'); ?>
    </div>
    <!-- 友達パネル -->
    <?php echo View::forge('scds/friendpanel'); ?>
    <!-- footer -->
    <?php echo View::forge('scds/footer'); ?>
</div>
<!-- デポジット追加ダイアログ -->
<?php echo View::forge('scds/depositadddialog'); ?>
</body>
</html>
