<div role="main" class="ui-content">
    <ul data-role="listview" data-filter="true" data-filter-placeholder="Search Portfolio...">
        <?php
        echo '<li data-role="list-divider">ポートフォリオ</li>';
        foreach ($port4lio as $data)
        {
            echo '<li>'.'<div style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">' . $data->to_screen_name . '</div>' . '<p style="text-overflow:ellipsis; overflow:hidden; ">' . $data->depositnum .'</p></li>';
        }
        ?>
    </ul>
</div>
