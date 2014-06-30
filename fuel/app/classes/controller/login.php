<?php

class Controller_Login extends Controller
{
  public function action_index()
  {
    //文字列を返す
    return Response::forge(View::forge('scds/login'));
  }
}
