<?php

class Controller_Home extends Controller
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
        $data = array();
        $twitter_user = Twitter::get('account/verify_credentials');
        $user = Model_User::find_one_by('screen_name', $twitter_user->screen_name, '=');
        $timeline = Twitter::get("statuses/home_timeline");
        $data['user'] = $user;
        $data['timeline'] = $timeline;
        //$output = print_r($timeline,true);
        //Log::debug('timeline = ' . $output);
        return Response::forge(View::forge('scds/home', $data));
    }
}
