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

    public function action_index()
    {
    }

    /**
     * 団子を友達にデポジットする
     * @return mixed
     */
    public function action_add()
    {
        //ホーム画面のデータを取得する
        //$data = Homecommon::getdata();
        //$user = $data['user'];
        $twitter_user = Twitter::get('account/verify_credentials');
        $user = Model_User::find_one_by('tuserid', $twitter_user->id, '=');

        $port = new Model_Port4lio();
        $port->from_screen_name = $user->screen_name;
        $port->from_tuserid = $user->tuserid;
        //$port->to_screen_name = ;
        //$port->to_tuserid = ;
        //$port->depositnum = ;
        //$port->message = ;
        //$port->date = ;

        $port->save();

        //ポートフォリオにデータを追加する
        Response::redirect(Uri::create('home'));
        //return Response::forge(View::forge('scds/home', $data));
    }
}
