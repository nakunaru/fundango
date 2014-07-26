<?php
/**
 * Created by PhpStorm.
 * User: kara_mage
 * Date: 2014/07/25
 * Time: 22:58
 */
class Controller_Timeline extends Controller_Rest
{
    /**
     * GETでタイムライン取得
     */
    public function get_timeline() {

    }
    /**
     * POSTでタイムライン取得
     */
    public function post_timeline() {
        //タイムライン取得処理。途中から差分取得
        $since_id = Input::param('since_id');
        $timeline = Timelinecommon::gettimeline($since_id);
        $this->response($timeline);
    }
}