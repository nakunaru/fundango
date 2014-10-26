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
        $data = array();
        $user = Usercommon::getuser($screen_name);
        if (!$user) {
            return null;
        }
        $data['user'] = $user;
        $rank = Homecommon::getrankinfo($user->tuserid);
        $data['rank'] = $rank;
        return $data;
    }
    /**
     * ユーザの情報を取得する
     * @return mixed
     */
    public static function getuser($screen_name)
    {
        $user = Model_User::find_one_by('screen_name', $screen_name, '=');
        return $user;
    }

    /**
     * Total Credit順にユーザのリストを取得する 最大20人
     * @return null
     */
    public static function getuserlistbytotalcredit()
    {
        $userlist = DB::query('select * from user ' . ' order by total_credit desc' . ' limit 20;')->as_object('Model_User')->execute()->as_array();
        if (!$userlist) {
            $userlist = array();
        }
        return $userlist;
    }
    public static function getview($screen_name)
    {
        $data = Usercommon::getdata($screen_name);
        if ($data == null) {
            return null;
        }
        $user = $data['user'];
        if (!$user->page_count) {
            $user->page_count = 1;
        } else {
            $user->page_count++;
        }
        $user->save();
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
    public static function getuserlistview()
    {
        $data = Usercommon::getuserlistdata();

        $view = View::forge('scds/userlist', $data);
        $data['userranks'] = Usercommon::getuserlistbytotalcredit();
        $view->set_global('user', $data['user']);
        $view->set_global('users', $data['users']);
        $view->set_global('userranks', $data['userranks']);
        $view->set_global('rank', $data['rank']);
        $view->set_global('followers', array());
        return $view;
    }
    public static function getuserlistdata()
    {
        $data = array();
        $users = Usercommon::getuserlist();
        if (!$users) {
            return null;
        }
        $user = Session::get('user');
        $rank = Session::get('rank');

        $data['users'] = $users;
        $data['user'] = $user;
        $data['rank'] = $rank;
        return $data;
    }
    public static function getuserlist()
    {
        $userlist = DB::query('select * from user ' . ' order by screen_name asc' . ';')->as_object('Model_User')->execute()->as_array();
        if (!$userlist) {
            $userlist = array();
        }
        return $userlist;
    }
}
