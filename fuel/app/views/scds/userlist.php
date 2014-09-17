
<div role="main" class="ui-content">
    <ol data-role="listview" data-inset="true" >
        <?php
        echo '<li data-role="list-divider">ユーザ株価ランキング</li>';
        foreach ($users as $data)
        {
            echo '<li><a href="#"><img src="' . $data->avator . '"></img>' . '<div>' . $data->screen_name . '</div>' . '<p class="ui-li-count">' . $data->total_credit . '</p>' .'</a></li>';
        }
        ?>
    </ol>
</div>
