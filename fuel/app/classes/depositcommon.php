<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/18
 * Time: 22:08
 */

class Depositcommon {
    public static function getdata($target_user)
    {
        $data = array();

        /*
        $ret = Session::get();
        $output = print_r($ret,true);
        Log::warning('deposit session all get ret = ' . $output);
        */

        if ($target_user != null) {
            $user = $target_user;
        } else {
            $user = Session::get('user');
        }
        $rank = Session::get('rank');
        $followers = array();

        //$output = print_r($user,true);
        //Log::warning('session data = ' . $output);

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
            //自分がその人に投資した総デポジット数
            $mine_deposit_credit = Depositcommon::getTotalCredit($to_user, $user);
            $port->cg = Depositcommon::getcg($to_user, $port->base_credit, $port->depositnum, $mine_deposit_credit);
        }

        $data['user'] = $user;
        $data['rank'] = $rank;
        $data['followers'] = $followers;
        $data['port4lio'] = $port4lio;
        $data['depositedlist'] = $depositedlist;
        return $data;
    }

    /**
     * デポジットの総額を取得する
     * @param $to_user
     * @param $from_user
     */
    public static function getTotalCredit($to_user, $from_user) {
        $total_credit = 0;
        $prt4lio_sql = "select sum(depositnum) as depositnum from port4lio where to_tuserid = :to_user and from_tuserid = :from_user;";
        $port4lio = DB::query($prt4lio_sql)->parameters(array('to_user'=>$to_user->tuserid, 'from_user'=>$from_user->tuserid))->execute()->as_array();
        foreach ($port4lio as $port) {      // 1行のみ確定ならifにするべき？
            $total_credit = $total_credit + $port['depositnum'];
        }
        return $total_credit;
    }

    /**
     * キャピタルゲインの取得
     */
    public static function getcg($to_user, $base_credit, $depositnum, $mine_deposit_credit)
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
            $percent = $to_user->total_credit - $mine_deposit_credit;
            /*
            $percent = $to_user->social_credit ;
            if ($to_user->deposited_credit) {
                $percent += $to_user->deposited_credit;
            }
            */
            $percent = $percent / $base_credit;
            $cg = floor($percent * $depositnum);
            $cg = $cg - $depositnum;
            if ($cg < 0) {
                $cg = 0;
            }
        }
        return $cg;
    }

    public static function getview()
    {
        $data = Depositcommon::getdata(null);
        $view = View::forge('scds/deposit', $data);
        $view->set_global('user', $data['user']);
        $view->set_global('rank', $data['rank']);
        $view->set_global('followers', $data['followers']);
        $view->set_global('port4lio', $data['port4lio']);
        $view->set_global('depositedlist', $data['depositedlist']);
        return $view;
    }
}
