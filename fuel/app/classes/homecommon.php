<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/12
 * Time: 15:16
 */

class Homecommon {
    /**
     * ホーム画面に関するデータの取得処理
     * @return array
     */
    public static function getdata()
    {
        $data = array();
        $since_id = 0;
        $user = Homecommon::getuser();
        /*
        $user = Session::get('user');
        if ($user == null) {
            $twitter_user = Twitter::get('account/verify_credentials');
            if (!$twitter_user) {
                Session::destroy();
                Response::redirect(Uri::create('login'));
            }
            $user = Model_User::find_one_by('tuserid', $twitter_user->id, '=');
        }
        */

        //ユーザの総数を取得
        $all_users = DB::query('select * from user order by total_credit desc;')->execute()->as_array();
        $rank = array();
        $all_users_count = count($all_users);
        $rank['all_users_count'] = $all_users_count;
        $rankcnt = 0;
        foreach ($all_users as $tmp) {
            $rankcnt++;
            if ($user->tuserid == $tmp['tuserid']) {
                break;
            }
        }
        $rank['user_rank'] = $rankcnt;

        $data['rank'] = $rank;
        Session::delete('rank');
        Session::set('rank', $data['rank']);

        $data['timeline'] = array();

        //$ids = Session::get('ids');
        //if ($ids == null) {
            $ids = Twitter::get("followers/ids");
            $data['ids'] = $ids->__resp->data->ids;
        /*
        } else {
            $data['ids'] = $ids;
        }
        Session::delete('ids');
        Session::set('ids', $data['ids']);
        */

        $data['user'] = $user;
        $idstr = '';
        $count = 0;
        $since_id = 0;
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
        //Session::delete('user');
        //Session::set('user', $data['user']);

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

    public static function getuser()
    {
        $user = Session::get('user');
        if ($user == null) {
            $twitter_user = Twitter::get('account/verify_credentials');
            if (!$twitter_user) {
                Session::destroy();
                Response::redirect(Uri::create('login'));
            }
            $user = Model_User::find_one_by('tuserid', $twitter_user->id, '=');
            Session::delete('user');
            Session::set('user', $user);
        }
        return $user;
    }
    /**
     * ビューを取得する
     * @return mixed
     */
    public static function getview()
    {
        $data = Homecommon::getdata();
        $view = View::forge('scds/home', $data);
        $view->set_global('user', $data['user']);
        $view->set_global('followers', $data['followers']);
        $view->set_global('to_users', $data['to_users']);
        $view->set_global('timeline', $data['timeline']);
        $view->set_global('since_id', $data['since_id']);
        $view->set_global('rank', $data['rank']);
        return $view;
    }
}