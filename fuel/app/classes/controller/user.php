<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/09/03
 * Time: 7:30
 */
class Controller_User extends Controller
{

    /**
     * あなたの before メソッド
     */
    public function before()
    {
        parent::before(); // この行がないと、テンプレートが動作しません!

        // 何かする
        //ログインしてなくても、このページは見れるとする
    }

    /**
     * ユーザの一覧を表示する
     */
    public function action_index()
    {
        //TODO
        /*
        $view = Boardcommon::getview();
        return Response::forge($view);
        */
    }

    public function action_view()
    {
        //パラメータからscreen_name 取得
        $screen_name = Input::param('screen_name');

        //ない場合、ログイン画面に飛ばす
        $view = Usercommon::getview($screen_name);
        if ($view == null) {
            Response::redirect(Uri::create('login'));
            return;
        }
        return Response::forge($view);
    }
}
