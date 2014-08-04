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

        foreach ($timeline as $tweet) {
            //ツイートされた時間を文字列に変換する
            //$created_at = 'Wed, 03 Oct 2012 00:00:00 +0000';
            $created_at = $tweet->created_at;
            $datetime = date('H:i', strtotime($created_at));
            $tweet->datestr = $datetime;

            //団子の数を取得する
            $user = Model_User::find_one_by('tuserid', $tweet->id, '=');
            if ($user) {
                $tweet->credit = $user->social_credit + $user->deposited_credit;
            } else {
                $tweet->credit = 0;
            }
        }
        return $timeline;
    }
}
