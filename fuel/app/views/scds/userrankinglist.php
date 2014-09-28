<div role="main" class="ui-content">
    <ol data-role="listview" data-inset="true" >
        <?php
        echo '<li data-role="list-divider">ユーザ株価ランキング</li>';
        foreach ($users as $data)
        {
            echo '<li><a href="' . URI::create('user/view') . '?screen_name=' . $data->screen_name .'"><img src="' . $data->avator . '"></img>' . '<div>' . $data->screen_name . '</div>' . '<p class="ui-li-count">' . $data->total_credit . 'd</p>' .'</a></li>';
        }
        ?>
</ol>
</div>
