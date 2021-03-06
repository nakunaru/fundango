<!DOCTYPE html>
<html class="fsvs">
<head>
    <title>Fundango とは？</title>
    <?php echo View::forge('scds/htmlheader'); ?>
</head>
<body>
<!--ページ領域-->
<!--  -->
<div data-role="page" id="help"  data-title="help" data-url="<?php echo URI::create('help'); ?>" >
    <div data-role="header" data-position="fixed">
        <h1>Fundangoって何？</h1>
    </div>

    <div id="fsvs-body" role="main" class="ui-content">
        <div class="slide">
        <h1>みんなが“上場”している社会を創る</h1>
        Fundangoの名前の由来は、

        「私は○○さんの"ファン"です」の"fun"と"dango"=団子とを掛けあわせた言葉です。

        "fund"には、「<span class="st">投資信託</span>=<span class="st">投資のプロ</span>」という意味も掛かっています。
        </div>

        <div class="slide">
        <h2>Fundangoの目的</h2>
        <strong>個人の信用を見える化する</strong>ことです。

        誰が誰に対して信用しているのか、それを数値やグラフとして表示します。

        個人の信用をよりわかりやすく表現するために、Fundangoでは信用=団子をいう表現を用います。

        個人の信用が「可視化」される社会では、そこに参加する人すべてに、「株価」がついています。

        Fundangoでは、団子を持っている人ほど、株価が高いということになります。

        &nbsp;
        </div>
        <div class="slide">
        <h2>個人の信用=団子?</h2>

        &nbsp;

        Fundangoでは、個人の信用を"団子"というカタチで表現します。

        <strong>団子をいっぱい持ってる人=個人の信用が高い人</strong>という意味合いになります。

        Fundangoでは、団子1つ分を<strong>"1d"</strong>と表記します。

        &nbsp;

            </div>

        <div class="slide">
        <h2>株式市場を簡略化したモデル</h2>
        Fundangoは株式市場をモデルとした取引を団子によって行います。

        手持ちの団子は、対象の相手に対して
        <ul>
            <li>デポる(デポジット)</li>
            <li>ドローする</li>
        </ul>
        ことができます。

        &nbsp;
            </div>
        <div class="slide">
        <h2>デポるとは？</h2>
        <p>団子は他のユーザに対してデポることができます。</p>

        団子をデポるとその団子はポートフォリオの中に入ります。

        団子をデポるとは、「あなたのことを信頼しています」「あなたに投資します」「あなたを応援しています」という意味になります。

        つまり自分の相手への信頼の証として、団子をデポジットします。

        より多くのデポジットを集めているユーザは個人の信用が高いと言えます。

        これは株式市場でいう企業の株を買う行為に相当します。

        手持ちの団子の数とデポジットされた団子の合計が、その人の個人の株価となります。
            </div>

        <div class="slide">
        &nbsp;
        <h2>ポートフォリオとは?</h2>
        ポートフォリオとは、株式市場でいう投資家や金融機関が保有する、株式をはじめとする各種有価証券類のことです。

        Fundangoでは、団子の投資先のリストのことを指します。

        ポートフォリオを見ることによって、誰が誰に投資しているかが見える化されます。

        &nbsp;
        <h2>ドローとは？</h2>
        デポジットした団子を自分の手元に引き上げる行為をドローといいます。

        ドローする際、デポジットした際の株価より上がっている場合、CG(キャピタル・ゲイン)、つまり利益を得ることができます。

        これは株式市場でいう企業の株を売る行為に相当します。

        &nbsp;
        <h2>アカウントはTwitterのIDを使用する</h2>
        ログインする際はTwitterのアカウントが必要です。

        Facebookアカウントでのログインも今後できるようになる予定です。

        &nbsp;

        今後は、スマホのアプリも作る予定です。
        <a href="<?php echo URI::create('home'); ?>" data-ajax="false" data-role="button" data-rel="">ホームへ</a>
            </div>
    </div>

</div>
</body>
</html>
