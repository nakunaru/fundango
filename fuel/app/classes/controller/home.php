<?php

class Controller_Home extends Controller
{
  public function action_index()
  {
      $data = array();
      $twitter_user = Twitter::get('account/verify_credentials');
      $user = Model_User::find_one_by('screen_name', $twitter_user->screen_name, '=');
      $timeline = Twitter::get("statuses/home_timeline");
      $data['user'] = $user;
      $data['timeline'] = $timeline;
      return Response::forge(View::forge('scds/home', $data));
  }
}
