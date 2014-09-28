<div role="main" class="ui-content">
    <ul data-role="listview" data-inset="true" data-autodividers="true" data-filter="true" data-filter-placeholder="Search user...">
        <?php
        echo '<li data-role="list-divider">ユーザリスト</li>';
        foreach ($users as $data)
        {
            echo '<li><a href="' . URI::create('user/view') . '?screen_name=' . $data->screen_name .'"><img src="' . $data->avator . '"></img>' . '<div>' . $data->screen_name . '</div>' . '<p class="ui-li-count">' . $data->total_credit . 'd</p>' .'</a></li>';
        }
        ?>
    </ul>
</div>
