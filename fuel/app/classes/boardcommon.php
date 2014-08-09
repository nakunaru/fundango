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
        /*
        $tuserid = $user->tuserid;
        $port4lio = Model_Port4lio::find_by('from_tuserid', $tuserid, '=');
        $depositedlist = Model_Port4lio::find_by('to_tuserid', $tuserid, '=');
        */
        $data['user'] = $user;
        $data['rank'] = $rank;
        $data['followers'] = $followers;
        //$data['port4lio'] = $port4lio;
        //$data['depositedlist'] = $depositedlist;
        return $data;
    }

    public static function getview()
    {
        $data = Boardcommon::getdata();
        $view = View::forge('scds/board', $data);
        $view->set_global('user', $data['user']);
        $view->set_global('rank', $data['rank']);
        $view->set_global('followers', $data['followers']);
        /*
        $view->set_global('port4lio', $data['port4lio']);
        $view->set_global('depositedlist', $data['depositedlist']);
        */
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
