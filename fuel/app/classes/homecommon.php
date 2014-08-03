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
        $since_id = 0;
        $twitter_user = Twitter::get('account/verify_credentials');
        $user = Model_User::find_one_by('tuserid', $twitter_user->id, '=');
        $timeline = Twitter::get("statuses/home_timeline",
            array('count'=>20,
                "include_entities"=>true
            )
        );

        $ids = Twitter::get("followers/ids");
        $data['user'] = $user;
        if ($timeline) {
            $data['timeline'] = $timeline->__resp->data;
        } else {
            $data['timeline'] = array();
        }
        $data['ids'] = $ids->__resp->data->ids;
        $idstr = '';
        $count = 0;
        foreach ($data['timeline'] as $line){
            $since_id = $line->id;
            break;
        }
        $data['since_id'] = $since_id;

        $sqlwherestr = '';
        $is_sql = false;
        foreach ($data['ids'] as $id){
            if ($count == 100) {
                break;
            }
            if ($idstr == '') {
                $idstr = $id;
                $sqlwherestr = "where tuserid = '" . $id . "'";
                $is_sql = true;
            } else {
                $idstr = $idstr . ',' . $id;
                $sqlwherestr = $sqlwherestr .  " or tuserid = '" . $id . "'";
            }
            $count++;
        }
        $followers = Twitter::get("users/lookup",array('user_id'=>$idstr));
        if ($followers) {
            $data['followers'] = $followers->__resp->data;
        } else {
            $data['followers'] = array();
        }
        Session::delete('user');
        Session::set('user', $data['user']);

        if ($is_sql) {
            $to_users = DB::query('select * from user ' . $sqlwherestr . ';')->execute()->as_array('tuserid');
        } else {
            $to_users = array();
        }

        foreach ($data['followers'] as $follower) {
            $followerid = '' . $follower->id;
            if (isset($to_users[$followerid])) {
                $to_user = $to_users[$followerid];
                if ($to_user) {
                    $follower->credit = '0';
                    $follower->credit = $to_user['social_credit'] + $to_user['deposited_credit'];
                } else {
                    $follower->credit = '0';
                }
            } else {
                $follower->credit = '0';
            }
        }

        $data['to_users'] = $to_users;

        //Session::set('followers', $data['followers']);
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
        $view->set_global('to_users', $data['to_users']);
        $view->set_global('timeline', $data['timeline']);
        $view->set_global('since_id', $data['since_id']);
        return $view;
    }
}