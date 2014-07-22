<div role="main" class="ui-content">
    <ul id="timelinelist" data-role="listview" data-filter="true" data-filter-placeholder="Search timeline...">
        <?php
        echo '<li data-role="list-divider">タイムライン</li>';
        foreach ($timeline as $data)
        {
            echo '<li>'.'<img src="' . $data->user->profile_image_url . '"><div style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">' . $data->text . '</div>' . '<p style="text-overflow:ellipsis; overflow:hidden; ">' . $data->user->name . ' @' . $data->user->screen_name .'</p></li>';
        }
        ?>
    </ul>
</div>
