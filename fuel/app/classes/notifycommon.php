<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/21
 * Time: 17:07
 */
class Notifycommon {
    public static function getdata()
    {
        $data = array();
        $user = Session::get('user');
        //$followers = Session::get('followers');
        $followers = array();
        $notifylist = array();
        //$output = print_r($user,true);
        //Log::warning('session data = ' . $output);
        //$user = $data['user'];
        /*
        $tuserid = $user->tuserid;
        $port4lio = Model_Port4lio::find_by('from_tuserid', $tuserid, '=');
        $depositedlist = Model_Port4lio::find_by('to_tuserid', $tuserid, '=');
        */
        $data['user'] = $user;
        $data['followers'] = $followers;
        $data['notifylist'] = $notifylist;
        //$data['port4lio'] = $port4lio;
        //$data['depositedlist'] = $depositedlist;
        return $data;
    }

    public static function getview()
    {
        $data = Boardcommon::getdata();
        $view = View::forge('scds/notify', $data);
        $view->set_global('user', $data['user']);
        $view->set_global('followers', $data['followers']);
        $view->set_global('notifylist', $data['notifylist']);
        /*
        $view->set_global('port4lio', $data['port4lio']);
        $view->set_global('depositedlist', $data['depositedlist']);
        */
        return $view;
    }
}
