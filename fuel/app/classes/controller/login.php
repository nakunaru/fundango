<?php

class Controller_Login extends Controller
{
    public function action_auto_insert()
    {
        $post = Model_Tb1::forge();

        $row = array();
        $row['bang'] = 'A10x';
        $row['name'] = '柿本';
        $row['tosi'] = '35';
        $post->set($row);

        $result = $post->save();
    }

    public function action_index()
    {
        $data = array();
        $data['users'] = Model_Tb1::find_all();
        //文字列を返す
        return Response::forge(View::forge('scds/login', $data));
    }
}
