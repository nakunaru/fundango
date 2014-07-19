<div role="main" class="ui-content">
    <!--3タブパネル全体を定義-->
    <div id="tabs" data-role="tabs">
        <!--2タブリストを準備-->
        <div data-role="navbar">
            <ul>
                <li><a href="#tabport4lio" class="ui-btn-active">ポートフォリオ</a></li>
                <li><a href="#tabdeposited">被デポジットリスト</a></li>
            </ul>
        </div>
        <!--1パネル（コンテンツ領域）を準備-->
        <div id="tabport4lio" class="ui-body ui-body-a">
            <br>
            <ul data-role="listview">
                <?php
                echo '<li data-role="list-divider">ポートフォリオ</li>';
                foreach ($port4lio as $data)
                {
                    echo '<li>'.'<div style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">' . $data->to_screen_name . ' さんにデポジットしました</div>' . '<p style="text-overflow:ellipsis; overflow:hidden; ">CG:xxd</p><div class="ui-li-count">' . $data->depositnum .'d</div></li>';
                }
                ?>
            </ul>
        </div>
        <div id="tabdeposited" class="ui-body ui-body-a">
            <p>test</p>
        </div>
    </div>
</div>
