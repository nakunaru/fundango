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
        $rank = Session::get('rank');
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

        //キャピタルゲインを計算する
        foreach ($port4lio as $port) {
            $to_user = Model_User::find_one_by('tuserid', $port->to_tuserid, '=');
            $port->cg = Depositcommon::getcg($to_user, $port->base_credit, $port->depositnum);
            /*
            if ($to_user) {
                $port->cg = $to_user->social_credit - $port->base_credit;
                //$port->cg = 0;
                if ($to_user->deposited_credit) {
                    $port->cg +=  $to_user->deposited_credit;
                }
                if ($port->cg < 0) {
                    $port->cg = 0;
                }
            } else {
                $port->cg = 0;
            }
            */
        }

        $data['user'] = $user;
        $data['rank'] = $rank;
        $data['followers'] = $followers;
        $data['port4lio'] = $port4lio;
        $data['depositedlist'] = $depositedlist;
        return $data;
    }

    /**
     * キャピタルゲインの取得
     */
    public static function getcg($to_user, $base_credit, $depositnum)
    {
        $cg = 0;
        if ($to_user) {
            if ($base_credit <= 1) {
                $base_credit = 1;
                if ($to_user->social_credit > 0) {
                    $base_credit = $to_user->social_credit;
                }
            }
            //倍率
            $percent = $to_user->social_credit ;

            //$cg = $to_user->social_credit - $base_credit;
            if ($to_user->deposited_credit) {
                //$cg +=  $to_user->deposited_credit;
                $percent += $to_user->deposited_credit;
            }
            $percent = $percent / $base_credit;
            $cg = floor($percent * $depositnum);
            if ($cg < 0) {
                $cg = 0;
            }
        }
        return $cg;
    }

    public static function getview()
    {
        $data = Depositcommon::getdata();
        $view = View::forge('scds/deposit', $data);
        $view->set_global('user', $data['user']);
        $view->set_global('rank', $data['rank']);
        $view->set_global('followers', $data['followers']);
        $view->set_global('port4lio', $data['port4lio']);
        $view->set_global('depositedlist', $data['depositedlist']);
        return $view;
    }
}
