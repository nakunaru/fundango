<?php

class Controller_Home extends Controller
{
  public function action_index()
  {
      $data = array();
      $twitter_user = Twitter::get('account/verify_credentials');
      $user = Model_User::find_one_by('screen_name', $twitter_user->screen_name, '=');
      $data['user'] = $user;
      return Response::forge(View::forge('scds/home', $data));
  }
}
