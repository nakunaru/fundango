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
                <li><h1>kara_mage</h1><h5>現値 : 503</h5><h5 class="boardparcent">前比 : ▲+0.23%</h5><p>日時 : 15:01</p><p class="ui-li-aside">H 504 L 499</p></li>
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
