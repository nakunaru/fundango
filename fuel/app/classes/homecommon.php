<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/12
 * Time: 15:16
 */

class Homecommon {
    public static function getdata()
    {
        $data = array();
        $twitter_user = Twitter::get('account/verify_credentials');
        $user = Model_User::find_one_by('tuserid', $twitter_user->id, '=');
        $timeline = Twitter::get("statuses/home_timeline");
        $ids = Twitter::get("followers/ids");
        $data['user'] = $user;
        $data['timeline'] = $timeline->__resp->data;
        $data['ids'] = $ids->__resp->data->ids;
        $idstr = '';
        $count = 0;
        foreach ($data['ids'] as $id){
            if ($count == 100) {
                break;
            }
            if ($idstr == '') {
                $idstr = $id;
            } else {
                $idstr = $idstr . ',' . $id;
            }
            $count++;
        }
        //Log::warning('idstr = ' . $idstr);
        $followers = Twitter::get("users/lookup",array('user_id'=>$idstr));
        if ($followers) {
            $data['followers'] = $followers->__resp->data;
        } else {
            $data['followers'] = array();
        }
        //$output = print_r($followers,true);
        //Log::warning('followers = ' . $output);
        return $data;
    }
    public static function getview()
    {
        $data = Homecommon::getdata();
        $view = View::forge('scds/home', $data);
        $view->set_global('user', $data['user']);
        $view->set_global('followers', $data['followers']);
        $view->set_global('timeline', $data['timeline']);
        return $view;
    }
}