<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/26
 * Time: 9:09
 */
class Timelinecommon {

    /**
     * タイムライン
     */
    public static function gettimeline($since_id)
    {
        if ($since_id != 0) {
            $response = Twitter::get("statuses/home_timeline",
                array('count'=>20,
                    'since_id'=>$since_id,
                    "include_entities"=>true
                )
            );
        } else {
            $response = Twitter::get("statuses/home_timeline",
                array('count'=>20,
                    "include_entities"=>true
                )
            );
        }
        if ($response) {
            $timeline = $response->__resp->data;
        } else {
            $timeline = array();
        }

        $since_id_cnt = -1; //もしsince_idを含んでいるのならそれは取り除く
        $cnt = 0;
        foreach ($timeline as $tweet) {
            //ツイートされた時間を文字列に変換する
            //$created_at = 'Wed, 03 Oct 2012 00:00:00 +0000';
            $created_at = $tweet->created_at;
            $datetime = date('H:i', strtotime($created_at));
            $tweet->datestr = $datetime;

            //団子の数を取得する
            $user = Model_User::find_one_by('tuserid', $tweet->user->id_str, '=');
            if ($user) {
                $tweet->credit = $user->social_credit + $user->deposited_credit;
            } else {
                $tweet->credit = 0;
            }
            if ($since_id == $tweet->id
            || $since_id == $tweet->id_str) {
                $since_id_cnt = $cnt;
            }
            $cnt++;
        }
        if ($since_id_cnt > -1) {
            //since_id を取り除く
            array_splice($timeline, $since_id_cnt, 1);
        }
        return $timeline;
    }

    /**
     * ツイッターのタイムラインに投稿する
     * @param $screen_name
     * @param $depositnum
     */
    public static function updatetimeline($screen_name, $depositnum)
    {
        //$url = 'http://www.karamage.com/~kara_mage/scds/index.php/login';
        $url = URI::create('home');
        $result = Twitter::post('statuses/update',
            array('status' => '🍡' . ' @' . $screen_name . ' さんに' . $depositnum . '団子、デポりました。 ' . $url . ' #fundango'
            ));
        return $result;
    }
}
