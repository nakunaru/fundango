<div data-role="panel" id="friendpanel" data-position="right" data-display="overlay">
    <!-- panel content goes here -->
    <ul data-role="listview" data-filter="true" data-filter-placeholder="Search friends...">
        <?php
        echo '<li data-role="list-divider">友達</li>';
        foreach ($followers as $data)
        {
            echo '<li class="friendli" screen_name="' . $data->screen_name . '" tuserid="' . $data->id . '"><a href="#depositAddDialog" data-rel="dialog" data-transition="pop"><div style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">' . $data->name . '</div><div class="ui-li-count">0d</div><p style="text-overflow:ellipsis; overflow:hidden; ">' . $data->screen_name . '</p></a></li>';
        }
        ?>
    </ul>
</div>