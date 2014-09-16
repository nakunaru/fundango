<ul data-role="listview" data-filter="true" data-filter-placeholder="Search Users...">
    <?php
    echo '<li data-role="list-divider">ユーザランキング</li>';
    foreach ($users as $data)
    {
        echo '<li>' . $data->screen_name .'</li>';
    }
    ?>
</ul>
