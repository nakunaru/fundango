<div role="main" class="ui-content">
    <ul data-role="listview" data-filter="true" data-filter-placeholder="Search notify...">
        <?php
        echo '<li data-role="list-divider">通知リスト</li>';
        foreach ($notifylist as $data)
        {
            if ($data->seen == '0') {
                echo '<li class="unreadnotify">' . '<div style="text-overflow:ellipsis; overflow:hidden; white-space: normal;"><b>'. $data->message . '</b></div> ' . '<p class="ui-li-aside">' . $data->date . '</p></li>';
            } else {
                echo '<li>' . '<div style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">'. $data->message . '</div> ' . '<p class="ui-li-aside">' . $data->date . '</p></li>';
            }
        }
        ?>
    </ul>
</div>
