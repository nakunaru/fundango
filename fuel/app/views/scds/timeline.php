<div role="main" class="ui-content">
    <ul id="timelinelist" data-role="listview" data-filter="true" data-filter-placeholder="Search timeline...">
        <?php
        echo '<li data-role="list-divider">タイムライン</li>';
        foreach ($timeline as $data)
        {
            echo '<li>'.'<img class="wow slideInLeft" src="' . $data->user->profile_image_url
                . '"><div class="timelinetext" style="text-overflow:ellipsis; overflow:hidden; white-space: normal;">'
                . $data->text . '</div>' . '<p style="text-overflow:ellipsis; overflow:hidden; ">'
                . $data->user->name . ' @' . $data->user->screen_name .'</p>';
            // twitter の投稿画像表示
            if (property_exists($data->entities,'media')) {
                if (count($data->entities->media) > 0) {
                    $img = $data->entities->media[0]->media_url;
                    echo '<img src="' . $img . '">';
                }
            }
            //外部サービスの画像を表示
            if (property_exists($data->entities,'urls')) {
                if (count($data->entities->urls) > 0) {
                    $isimg = false;
                    $img = $data->entities->urls[0]->expanded_url;
                    //URLを「twitpic.com/show/full/ID」とすることで画像の直リンクが取得できる。
                    //「full」を「thumb」にすればサムネイルサイズが取得できます。
                    if(strpos($img,'twitpic') != 0){
                        $isimg = true;
                        $img = str_replace('twitpic.com/','twitpic.com/show/full/',$img);
                    }
                    if(strpos($img,'twipple') != 0){
                        $isimg = true;
                        $img = str_replace('twipple.jp/','twipple.jp/show/large/',$img);
                    }
                    if(strpos($img,'photozou') != 0){
                        $isimg = true;
                        $img = preg_replace('/photozou.jp\/photo\/show\/[0-9]*\//','photozou.jp/p/img/',$img);
                    }
                    if(strpos($img,'instagram.com/p/') != 0){
                        $instaurl = 'http://api.instagram.com/oembed?url=' . $img;
                        $instajson = file_get_contents($instaurl);
                        $json =  json_decode($instajson);
                        if (property_exists($json,'url')) {
                            $isimg = true;
                            $img = $json->url;
                        }
                    }
                    if ($isimg) {
                        echo '<img src="' . $img . '">';
                    }
                }
            }
            echo '</li>';
        }
        ?>
    </ul>
</div>
