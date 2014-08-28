<div role="main" class="ui-content">
    <ul data-role="listview" data-filter="true" data-filter-placeholder="Search notify...">
        <?php
        echo '<li data-role="list-divider">通知リスト</li>';
        foreach ($notifylist as $data)
        {
            if ($data->seen == '0') {
                echo '<li><b>'. $data->message . ' ' . $data->date . '</b></li>';
            } else {
                echo '<li>'. $data->message . ' ' . $data->date . '</li>';
            }
        }
        ?>
    </ul>
</div>
