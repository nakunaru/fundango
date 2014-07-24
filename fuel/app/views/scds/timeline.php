<div role="main" class="ui-content">
    <ul id="timelinelist" data-role="listview" data-filter="true" data-filter-placeholder="Search timeline...">
        <?php
        echo '<li data-role="list-divider">タイムライン</li>';
        foreach ($timeline as $data)
        {
            echo '<li>'.'<img src="' . $data->user->profile_image_url
                . '"><div class="timelinetext" style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">'
                . $data->text . '</div>' . '<p style="text-overflow:ellipsis; overflow:hidden; ">'
                . $data->user->name . ' @' . $data->user->screen_name .'</p>';
            if (count($data->entities->media) > 0) {
                echo 'media';
            }
            if (count($data->entities->urls) > 0) {
                echo 'urls';
            }
            echo '</li>';
        }
        ?>
    </ul>
</div>
