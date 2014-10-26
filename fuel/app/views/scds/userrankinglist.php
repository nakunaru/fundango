<div role="main" class="ui-content" id="userrankinglist">
    <ol data-role="listview" data-inset="true" >
        <?php
        echo '<li data-role="list-divider">ユーザ株価ランキング(上位20位)</li>';
        foreach ($users as $data)
        {
            echo '<li><a href="' . URI::create('user/view') . '?screen_name=' . $data->screen_name .'" data-ajax="false"><img src="' . $data->avator . '"></img>' . '<div>' . $data->screen_name . '</div>' . '<p class="ui-li-count total_credit" total_credit="' . $data->total_credit . '">' . $data->total_credit . 'd</p>' .'</a></li>';
        }
        ?>
</ol>
</div>
