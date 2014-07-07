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
        $ids = Twitter::get("followers/ids");
        $data['user'] = $user;
        $data['timeline'] = $timeline->__resp->data;
        $data['ids'] = $ids->__resp->data;
        $idstr = '';
        $count = 0;
        foreach ($ids as $id){
            if ($count == 100) {
               break;
            }
            if ($idstr == '') {
                $idstr = $id;
            } else {
                $idstr = $idstr . ',' . $id;
            }
            $count++;
        }
        $followers = Twitter::get("users/lookup",array('user_id'=>$idstr));
        $data['followers'] = $followers->__resp->data;
        //$output = print_r($ids,true);
        //Log::warning('ids = ' . $output);
        Log::warning('idstr = ' . $idstr);
        return Response::forge(View::forge('scds/home', $data));
    }
}
