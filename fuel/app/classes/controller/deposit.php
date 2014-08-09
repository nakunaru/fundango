<?php

class Controller_Deposit extends Controller
{
    /**
     * あなたの before メソッド
     */
    public function before()
    {
        parent::before(); // この行がないと、テンプレートが動作しません!

        // 何かする
        if ( ! Twitter::logged_in() )
        {
            Response::redirect(Uri::create('login'));
        }
    }

    /**
     * 自分がデポジットしたリストを表示する
     */
    public function action_index()
    {
        $view = Depositcommon::getview();
        return Response::forge($view);
    }

    /**
     * 団子を友達にデポジットする
     * @return mixed
     */
    public function action_add()
    {
        //ホーム画面のデータを取得する
        $data = Homecommon::getdata();
        $user = $data['user'];
        //$twitter_user = Twitter::get('account/verify_credentials');
        //$user = Model_User::find_one_by('tuserid', $twitter_user->id, '=');
        $depositnum = Input::param('depositnum');
        $to_screen_name = Input::param('to_screen_name');
        $to_tuserid = Input::param('to_tuserid');
        $message = Input::param('message');

        //ポートフォリオ情報を作成する
        $port = new Model_Port4lio();
        $port->from_screen_name = $user->screen_name;
        $port->from_tuserid = $user->tuserid;
        $port->to_screen_name = $to_screen_name;
        $port->to_tuserid = $to_tuserid;
        $port->depositnum = $depositnum;
        $port->message = $message;
        //$timestamp = Date::time();
        //$timestr = Date::forge($timestamp)->format('mysql');
        $timestr = Date::forge()->format('mysql');
        $port->date = $timestr;


        //自分のデポジット数にカウントアップする
        $user->deposit_credit = $user->deposit_credit + $port->depositnum;

        $user->save();

        //相手ユーザがすでに存在するかどうか？
        $to_user = Model_User::find_one_by('tuserid', $to_tuserid, '=');
        if ( ! $to_user)
        {
            //存在しないならあらかじめ作る
            $to_user = new Model_User();
            $to_user->tuserid = $to_tuserid;
            $to_user->screen_name = $to_screen_name;
            //被デポジットをカウントアップ
            $to_user->deposited_credit = $depositnum;
            $to_user->social_credit = 0;
        } else {
            //被デポジットをカウントアップ
            $to_user->deposited_credit = $to_user->deposited_credit + $depositnum;
        }
        $to_user->total_credit = $to_user->social_credit + $to_user->deposited_credit;
        $to_user->save();

        //株価の基準値を設定するこの値からキャピタルゲインがわかる
        $port->base_credit = $to_user->social_credit + $to_user->deposited_credit;
        $port->save();

        //株価情報を作成する
        Boardcommon::addboard($to_tuserid, $to_screen_name, $port->base_credit, $port->base_credit - $depositnum, $timestr);

        $istweet = Input::param('tweetflipswitch');
        $output = print_r($istweet,true);
        Log::warning('istweet = ' . $output);
        if ($istweet === "on") {
            //twitter に投稿するやり方
            $result = Twitter::post('statuses/update',
                array('status' => '🍡' . ' @' . $to_user->screen_name . ' さんに' . $depositnum . '団子、デポりました。 #scds'
                ));
        } else {
            Log::warning('not tweet');
        }

        //ポートフォリオにデータを追加する
        return Response::redirect(Uri::create('home'));
        //return Response::forge(View::forge('scds/home', $data));
    }
}
