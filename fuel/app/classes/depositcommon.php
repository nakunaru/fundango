<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/18
 * Time: 22:08
 */

class Depositcommon {
    public static function getdata()
    {
        $data = array();
        $user = Session::get('user');
        //$followers = Session::get('followers');
        $followers = array();
        //$output = print_r($user,true);
        //Log::warning('session data = ' . $output);
        //$user = $data['user'];
        $tuserid = $user->tuserid;
        $port4lio = Model_Port4lio::find_by('from_tuserid', $tuserid, '=');
        $depositedlist = Model_Port4lio::find_by('to_tuserid', $tuserid, '=');
        if ($port4lio === null) {
           $port4lio = array();
        }
        if ($depositedlist === null) {
            $depositedlist = array();
        }
        $data['user'] = $user;
        $data['followers'] = $followers;
        $data['port4lio'] = $port4lio;
        $data['depositedlist'] = $depositedlist;
        return $data;
    }

    public static function getview()
    {
        $data = Depositcommon::getdata();
        $view = View::forge('scds/deposit', $data);
        $view->set_global('user', $data['user']);
        $view->set_global('followers', $data['followers']);
        $view->set_global('port4lio', $data['port4lio']);
        $view->set_global('depositedlist', $data['depositedlist']);
        return $view;
    }
}
