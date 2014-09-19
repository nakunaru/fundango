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
     * 団子を友達からドローする
     */
    public function action_del()
    {
        $del_port4lio_id = Input::param('del_port4lio_id');
        $usertmp = Session::get('user');
        $user = Model_User::find_one_by('tuserid', $usertmp->tuserid, '=');
        $from_tuserid = $user->tuserid;
        $from_screen_name = $user->screen_name;
        $to_tuserid = Input::param('del_to_tuserid');
        $timestr = Date::forge()->format('mysql');
        $port4lio = Model_Port4lio::find_by_pk($del_port4lio_id);
        if ($port4lio->from_tuserid != $from_tuserid
        || $port4lio->to_tuserid != $to_tuserid) {
            Log::warning('port4lio draw error to_tuserid = ' . $to_tuserid . ' from_tuserid = ' . $from_tuserid . ' id=' . $port4lio->id);
            return Response::redirect(Uri::create('deposit'));
        }

        //相手の株価情報を追加する
        $to_user = Model_User::find_one_by('tuserid', $to_tuserid, '=');
        //自分がその人に投資した総デポジット数
        $mine_deposit_credit = Depositcommon::getTotalCredit($to_user,$user);
        //キャピタルゲインを算出
        $gc = Depositcommon::getcg($to_user, $port4lio->base_credit, $port4lio->depositnum, $mine_deposit_credit);

        $to_screen_name = $port4lio->to_screen_name;
        Boardcommon::addboard($to_tuserid, $to_screen_name, $to_user->total_credit - $port4lio->depositnum, $to_user->total_credit , $timestr);

        //相手のクレジット情報を更新する
        $to_user->deposited_credit = $to_user->deposited_credit - $port4lio->depositnum;
        $to_user->total_credit = $to_user->total_credit - $port4lio->depositnum;
        $to_user->save();

        //キャピタルゲインを自分に足す
        $user->social_credit = $user->social_credit + $gc;
        $user->total_credit = $user->total_credit + $gc;

        //自分の株価情報を追加する
        Boardcommon::addboard($from_tuserid, $from_screen_name, $user->total_credit, $user->total_credit - $gc , $timestr);

        //自分のクレジット情報を更新する
        $user->save();

        //通知情報を作成する
        $notify = new Model_Notify();
        $notify->seen = 0;
        $notify->tuserid = $to_user->tuserid;
        $notify->from_tuserid = $user->tuserid;
        $notify->message = $user->screen_name . 'さんが' . $port4lio->depositnum . 'dドローしました';
        $notify->date = $timestr;
        $notify->save();


        //該当するポートフォリオを削除する
        $port4lio->delete();

        return Response::redirect(Uri::create('deposit'));
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
        $user = Model_User::find_one_by('tuserid', $user->tuserid, '=');
        //$twitter_user = Twitter::get('account/verify_credentials');
        //$user = Model_User::find_one_by('tuserid', $twitter_user->id, '=');
        $depositnum = Input::param('depositnum');
        $to_screen_name = Input::param('to_screen_name');
        $to_tuserid = Input::param('to_tuserid');
        $message = Input::param('message');
        $to_image_url = Input::param('to_image_url');
        $from_image_url = Input::param('from_image_url');

        //デポジット可能数が足りないならエラーにする
        if ($user->social_credit - $user->deposit_credit - $depositnum < 0) {
            Log::warning('cant deposit screen_name = ' . $user->screen_name . ' depositnum=' . $depositnum);
            return Response::redirect(Uri::create('home'));
        }

        //ポートフォリオ情報を作成する
        $port = new Model_Port4lio();
        $port->from_screen_name = $user->screen_name;
        $port->from_tuserid = $user->tuserid;
        $port->to_screen_name = $to_screen_name;
        $port->to_tuserid = $to_tuserid;
        $port->to_image_url = $to_image_url;
        $port->from_image_url = $from_image_url;
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
            $user->avator = $to_image_url;
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

        //通知情報を作成する
        $notify = new Model_Notify();
        $notify->seen = 0;
        $notify->tuserid = $to_user->tuserid;
        $notify->from_tuserid = $user->tuserid;
        $notify->message = $user->screen_name . 'さんが' . $port->depositnum . 'dデポりました';
        $notify->date = $timestr;
        $notify->save();

        //tweetするかどうか
        $istweet = Input::param('tweetflipswitch');
        //$output = print_r($istweet,true);
        //Log::warning('istweet = ' . $output);
        if ($istweet === "on") {
            //twitter に投稿するやり方
            $result = Timelinecommon::updatetimeline($to_user->screen_name, $depositnum);
        } else {
            //Log::warning('not tweet');
        }

        //ポートフォリオにデータを追加する
        return Response::redirect(Uri::create('home'));
        //return Response::forge(View::forge('scds/home', $data));
    }
}
