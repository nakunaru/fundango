<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/21
 * Time: 17:07
 */
class Boardcommon {
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

        //ポートフォリオに自分の情報を配列の先頭に足す
        //$tuserid = $user->tuserid;
        //$port4lio = Model_Port4lio::find_by('from_tuserid', $tuserid, '=');

        // board 必要な情報
        // screen_name
        // 現在の株価　昨日の株価
        // 今日の株価 H L
        // 最終取引日時 hh:mm
        //

        $boards = array();
        /*
        $board = array();
        $board['screen_name'] = 'kara_mage';
        $board['total_credit'] = 100;
        $board['pre_total_credit'] = 90;
        $board['percent'] = '▲+2.31';
        $board['update_num'] = '+3';
        $board['h_total_credit'] = 110;
        $board['l_total_credit'] = 89;
        $board['date'] = '11:21';
        */

        //自分の株価情報の取得
        $board = array();
        $board['screen_name'] = $user->screen_name;
        $board['total_credit'] = $user->total_credit;

        //昨日以降の最後の株価を取得する

        //今日の日時取得
        $timestr = Date::forge()->format('%Y/%m/%d');
        $mybordlist_sql = "select * from boad where tuserid = :tuserid nad date < :timestr order by date desc;";
        $myboardlist = DB::query($mybordlist_sql)->parameters(array('tuserid'=>$tuserid, 'date'=> $timestr))->execute()->as_array();
        if (!$myboardlist || count($myboardlist) == 0) {
            //TODO
        } else {
            $myboard = $myboardlist[0];
            $board['pre_total_credit'] = $myboard['social_credit'];

            $update_num_str = '';
            $update_num = $user->total_credit - $myboard['social_credit'];
            if ($update_num >= 0) {
                $update_num_str = '+' . $update_num;
            } else {
                $update_num_str = '-' . $update_num;
            }

            $board['update_num'] = $update_num_str;

            $parcentstr = '';
            $parcent = $update_num / $user->total_credit;
            if ($update_num >= 0) {
                $parcentstr = '▲+' . $parcent;
            } else {
                $parcentstr = '▼-' . $parcent;
            }

            $board['percent'] = $parcentstr;

            $board['h_total_credit'] = 0;
            $board['l_total_credit'] = 0;
            $board['date'] = '00:00';
        }

        $boards[] = $board;

        //ポートフォリオから情報を取得する

        $data['boards'] = $boards;

        $data['user'] = $user;
        $data['rank'] = $rank;
        $data['followers'] = $followers;
        return $data;
    }

    public static function getview()
    {
        $data = Boardcommon::getdata();
        $view = View::forge('scds/board', $data);
        $view->set_global('user', $data['user']);
        $view->set_global('rank', $data['rank']);
        $view->set_global('followers', $data['followers']);
        $view->set_global('boards', $data['boards']);
        return $view;
    }

    /**
     * 株価情報の作成
     * @param $to_tuserid
     * @param $to_screen_name
     * @param $social_credit
     * @param $base_credit
     * @param $timestr
     */
    public static function addboard($to_tuserid, $to_screen_name, $social_credit, $base_credit, $timestr)
    {
        $board = new Model_Board();
        $board->tuserid = $to_tuserid;
        $board->screen_name = $to_screen_name;
        $board->social_credit = $social_credit;
        $board->base_credit = $base_credit;
        $board->date = $timestr;
        $board->save();
        return $board;
    }
}
