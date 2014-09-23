<div role="main" class="ui-content">
    <!--3タブパネル全体を定義-->
    <div id="tabs" data-role="tabs">
        <!--2タブリストを準備-->
        <div data-role="navbar">
            <ul>
                <li><a href="#tabboardlist" class="ui-btn-active">株価ボード</a></li>
                <li><a href="#tabchart">チャート</a></li>
                <li><a href="#tabranking">ランキング</a></li>
            </ul>
        </div>
        <!--1パネル（コンテンツ領域）を準備-->
        <div id="tabboardlist" class="ui-body ui-body-a">
            <br>
            <ul data-role="listview">
                <?php
                foreach ($boards as $data)
                {
                    echo '<li class="boardli"><h1>' . $data['screen_name'] . '</h1><h5>現値 : ' . $data['total_credit'] . 'd</h5><h5 class="boardparcentplus">前比 : ' . $data['percent'] . '%  ' . $data['update_num'] .'</h5><p>日時 : ' . $data['date'] . '</p><p class="ui-li-aside">H ' . $data['h_total_credit'] . ' L ' . $data['l_total_credit'] . '</p></li>';
                }
                ?>
                <!-- li class="boardli"><h1>kara_mage</h1><h5>現値 : 503d</h5><h5 class="boardparcentplus">前比 : ▲+0.23%  +3</h5><p>日時 : 15:01</p><p class="ui-li-aside">H 504 L 499</p></li>
                <li class="boardli"><h1>devfundango</h1><h5>現値 : 31d</h5><h5 class="boardparcentplus">前比 : ▲+2.11%  +6</h5><p>日時 : 14:01</p><p class="ui-li-aside">H 34 L 29</p></li>
                <li class="boardli"><h1>bryu_seru</h1><h5>現値 : 16d</h5><h5 class="boardparcentminus">前比 : ▲+3.07%  +5</h5><p>日時 : 14:09</p><p class="ui-li-aside">H 21 L 15</p></li -->
            </ul>
            <!-- canvas id="boardcanvas" height="500" width="500"></canvas -->
        </div>
        <div id="tabchart" class="ui-body ui-body-a">
            <br>
            <canvas id="chartcanvas" height="500" width="500"></canvas>
        </div>
        <div id="tabranking" class="ui-body ui-body-a">
            <br>
            <canvas id="rankingcanvas" height="500" width="500"></canvas>
        </div>
    </div>
</div>
