<?php

class Controller_Twitterlogin extends Controller
{
    public function action_index()
    {
        if(!Twitter::logged_in()) {
            Twitter::set_callback(Uri::current());  // 戻り先 URL
            Twitter::login();
        }
        $data = array();
        //$data['users'] = Model_Tb1::find_all();
        //文字列を返す
        return Response::forge(View::forge('scds/home', $data));
    }
}
