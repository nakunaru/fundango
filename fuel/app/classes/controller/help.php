<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/09/20
 * Time: 22:59
 */
class Controller_Help extends Controller
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
     * 通知リストを表示する
     */
    public function action_index()
    {
        $data = array();
        $view = View::forge('scds/notify', $data);
        return Response::forge($view);
    }
}
