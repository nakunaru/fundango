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
        $data['user'] = $user;
        //ユーザの総数を取得
        $rank = Homecommon::getrank($user->tuserid);
        $data['rank'] = $rank;

        $data['timeline'] = array();

        $ids = Homecommon::getfollowerids();
        $data['ids'] = $ids;
        //$ids = Session::get('ids');
        //if (!$ids) {
        /*
            $ids = Twitter::get("followers/ids");
            $data['ids'] = $ids->__resp->data->ids;
        */
            //Session::delete('ids');
            //Session::set('ids', $data['ids']);
        /*
        } else {
            $data['ids'] = $ids;
        }
        */

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

    /**
     * フォロワーのIDの配列を返す
     * @return mixed
     */
    public static function getfollowerids() {
        $idstr = Session::get('idstr');
        if (!$idstr) {
            $idstr = '';
            $ids = Twitter::get("followers/ids");
            if ($ids) {
                $ids = $ids->__resp->data->ids;
            } else {
                $ids = array();
            }
            foreach ($ids as $id) {
                if ($idstr == '') {
                    $idstr = $id;
                } else {
                    $idstr = $idstr . '&' . $id;
                }
            }
            //Session::delete('idstr');
            $ret = Session::set('idstr', $idstr);

            $ret = Session::get();
            $output = print_r($ret,true);
            Log::warning('follower ids session all get ret = ' . $output);
        } else {
            $ids = explode('&', $idstr);
        }
        return $ids;
    }

    /**
     * ランク情報の取得
     */
    public static function getrank($tuserid)
    {
        $rank = Session::get('rank');
        if (!$rank) {
            //ユーザの総数を取得
            $all_users = DB::query('select * from user order by total_credit desc;')->execute()->as_array();
            $rank = array();
            $all_users_count = count($all_users);
            $rank['all_users_count'] = $all_users_count;
            $rankcnt = 0;
            foreach ($all_users as $tmp) {
                $rankcnt++;
                if ($tuserid == $tmp['tuserid']) {
                    break;
                }
            }
            $rank['user_rank'] = $rankcnt;
            //Session::delete('rank');
            Session::set('rank', $rank);
        }
        return $rank;
    }

    /**
     * 自分の情報を取得する
     * @return mixed
     */
    public static function getuser()
    {
        $user = Session::get('user');
        if (!$user) {
            $twitter_user = Twitter::get('account/verify_credentials');
            if (!$twitter_user) {
                Session::destroy();
                Response::redirect(Uri::create('login'));
            }
            $user = Model_User::find_one_by('tuserid', $twitter_user->id, '=');
            //Session::delete('user');
            Session::set('user', $user);

            $ret = Session::get();
            $output = print_r($ret,true);
            Log::warning('user session all get ret = ' . $output);
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