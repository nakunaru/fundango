<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/12
 * Time: 15:16
 */

namespace Fuel\classes;


class Homecommon {
    public static function getdata()
    {
        $data = array();
        $twitter_user = Twitter::get('account/verify_credentials');
        $user = Model_User::find_one_by('screen_name', $twitter_user->screen_name, '=');
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
        $data['followers'] = $followers->__resp->data;
        //$output = print_r($followers,true);
        //Log::warning('followers = ' . $output);
        return $data;
    }
} 