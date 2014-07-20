<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/20
 * Time: 19:36
 */

class Controller_Board extends Controller
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
     * 株価ボードリストを表示する
     */
    public function action_index()
    {
        //$view = Depositcommon::getview();
        //return Response::forge($view);
    }

    /**
     * 株価チャートを表示する
     */
    public function action_chart()
    {

    }
}
