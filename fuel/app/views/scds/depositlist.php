<div role="main" class="ui-content">
    <!--3タブパネル全体を定義-->
    <div id="tabs" data-role="tabs">
        <!--2タブリストを準備-->
        <div data-role="navbar">
            <ul>
                <li><a href="#tabport4lio" class="ui-btn-active">ポートフォリオ</a></li>
                <li><a href="#tabdeposited">デポられリスト</a></li>
            </ul>
        </div>
        <!--1パネル（コンテンツ領域）を準備-->
        <div id="tabport4lio" class="ui-body ui-body-a">
            <br>
            <ul data-role="listview">
                <?php
                echo '<li data-role="list-divider">' . $user->screen_name . ' さんのポートフォリオ</li>';
                foreach ($port4lio as $data)
                {
                    echo '<li class="port4lioli" to_tuserid=' . $data->to_tuserid . ' cg="' . $data->cg . '" deposit_num="' . $data->depositnum .'" to_img_url="' . $data->to_image_url .'" port4lio_id="' . $data->id . '" tuserid="' . $data->from_tuserid . '" screen_name="' . $data->from_screen_name . '"><a href="#depositDelDialog" data-rel="dialog" data-transition="pop">'
                        .'<img src="' . $data->to_image_url . '">'
                        .'<div style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">'
                        . $data->to_screen_name
                        . ' さんにデポジットしています</div>'
                        . '<p class="ui-li-aside">'
                        . $data->date
                        . '</p><div style="text-overflow:ellipsis; overflow:hidden; color: #44ff99">CG: +' . $data->cg
                        . 'd </div><div>'
                        . $data->message
                        . '</div><div class="ui-li-count">' . $data->depositnum .'d</div></a></li>';
                }
                ?>
            </ul>
        </div>
        <div id="tabdeposited" class="ui-body ui-body-a">
            <br>
            <ul data-role="listview">
                <?php
                echo '<li data-role="list-divider">友達からのデポられリスト</li>';
                foreach ($depositedlist as $data)
                {
                    echo '<li><a target="_blank" href="' . URI::create('user/view?screen_name=') . $data->from_screen_name . '">'
                        .'<img src="' . $data->from_image_url . '">'
                        .'<div style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">'
                        . $data->from_screen_name
                        . ' さんからデポジットされています</div>'
                        . '<p class="ui-li-aside">'
                        . $data->date
                        . '</p><p style="text-overflow:ellipsis; overflow:hidden; ">'
                        . $data->message . '</p><div class="ui-li-count">' . $data->depositnum .'d</div></a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
