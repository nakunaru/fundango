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
        $view = Homecommon::getview();
        return Response::forge($view);
    }
}
