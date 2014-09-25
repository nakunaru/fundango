<?php

class Controller_Login extends Controller
{
    /*
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
    */

    public function action_index()
    {
        Session::destroy();
        $data = array();
        //$data['users'] = Model_Tb1::find_all();
        $data['users'] = Usercommon::getuserlistbytotalcredit();
        //文字列を返す
        $view = View::forge('scds/login', $data);

        $view->set_global('users', $data['users']);
        return Response::forge($view);
    }
}
