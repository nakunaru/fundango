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
        $timeline = array();
        //TODO タイムライン取得処理。途中から差分取得
        $this->response($timeline);
    }
}