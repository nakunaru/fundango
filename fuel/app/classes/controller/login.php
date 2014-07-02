<?php

class Controller_Login extends Controller
{
    public function action_index()
    {
        $data = array();
        $data['users'] = MOdel_Tb1::find_all();
        //文字列を返す
        return Response::forge(View::forge('scds/login', $data));
    }
}
