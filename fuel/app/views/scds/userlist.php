
<div role="main" class="ui-content">
    <ol data-role="listview" data-inset="true" >
        <?php
        echo '<li data-role="list-divider">ユーザ株価ランキング</li>';
        foreach ($users as $data)
        {
            echo '<li>' . $data->screen_name .'</li>';
        }
        ?>
    </ol>
</div>
