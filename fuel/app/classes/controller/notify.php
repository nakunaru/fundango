<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/20
 * Time: 19:36
 */

class Controller_Notify extends Controller
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
        $view = Notifycommon::getview();
        return Response::forge($view);
    }
}
