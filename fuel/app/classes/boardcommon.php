<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/21
 * Time: 17:07
 */
class Boardcommon {
    public static function getdata()
    {
        $data = array();
        $user = Session::get('user');
        $rank = Session::get('rank');
        //$followers = Session::get('followers');
        $followers = array();
        //$output = print_r($user,true);
        //Log::warning('session data = ' . $output);
        //$user = $data['user'];

        //ポートフォリオに自分の情報を配列の先頭に足す
        //$tuserid = $user->tuserid;
        //$port4lio = Model_Port4lio::find_by('from_tuserid', $tuserid, '=');

        //必要な情報
        // 今日の株価　昨日の株価
        //$boards = array();
        //$data['boards'] = $boards;

        $data['user'] = $user;
        $data['rank'] = $rank;
        $data['followers'] = $followers;
        return $data;
    }

    public static function getview()
    {
        $data = Boardcommon::getdata();
        $view = View::forge('scds/board', $data);
        $view->set_global('user', $data['user']);
        $view->set_global('rank', $data['rank']);
        $view->set_global('followers', $data['followers']);
        return $view;
    }

    /**
     * 株価情報の作成
     * @param $to_tuserid
     * @param $to_screen_name
     * @param $social_credit
     * @param $base_credit
     * @param $timestr
     */
    public static function addboard($to_tuserid, $to_screen_name, $social_credit, $base_credit, $timestr)
    {
        $board = new Model_Board();
        $board->tuserid = $to_tuserid;
        $board->screen_name = $to_screen_name;
        $board->social_credit = $social_credit;
        $board->base_credit = $base_credit;
        $board->date = $timestr;
        $board->save();
        return $board;
    }
}
