<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/09/26
 * Time: 7:30
 */
class Controller_Userlist extends Controller
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
     * ユーザの一覧を表示する
     */
    public function action_index()
    {
        $view = Usercommon::getuserlistview();
        return Response::forge($view);
    }
}
