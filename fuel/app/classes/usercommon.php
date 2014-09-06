<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/18
 * Time: 22:08
 */

class Usercommon {
    public static function getdata($screen_name)
    {

    }
    public static function getview($screen_name)
    {
        $data = Usercommon::getdata($screen_name);
        if ($data == null) {
            return null;
        }
        $view = View::forge('scds/user', $data);
        $view->set_global('user', $data['user']);
        $view->set_global('rank', $data['rank']);
        /*
        $view->set_global('followers', $data['followers']);
        $view->set_global('port4lio', $data['port4lio']);
        $view->set_global('depositedlist', $data['depositedlist']);
        */
        return $view;
    }
}
