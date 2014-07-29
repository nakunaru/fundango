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
                <li>test</li>
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
