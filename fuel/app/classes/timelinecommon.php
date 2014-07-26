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
        $response = Twitter::get("statuses/home_timeline",
            array('count'=>20,
                'since_id'=>$since_id,
                "include_entities"=>true
            )
        );
        $timeline = $response->__resp->data;
        return $timeline;
    }
}
