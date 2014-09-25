<?php

class Controller_Twitterlogin extends Controller
{
    /*
    public function action_index()
    {
        if(!Twitter::logged_in()) {
            //Twitter::set_callback(Uri::current());  // 戻り先 URL
            Twitter::set_callback("http://www.karamage.com/~kara_mage/scds/index.php/twitterlogin");  // 戻り先 URL
            //Twitter::logout();
            Twitter::login();
        }
        $data = array();
        //$data['users'] = Model_Tb1::find_all();
        //文字列を返す
        return Response::forge(View::forge('scds/home', $data));
    }
    */
    public function action_login()
    {
        $data = array();
        if ( ! Twitter::logged_in() )
        {
            Twitter::set_callback(Uri::create('twitterlogin/callback'));
            Twitter::login();
        }
        else
        {
            Response::redirect(Uri::create('home'));
            /*
            //$tokens = Twitter::get_tokens();
            $twitter_user = Twitter::get('account/verify_credentials');
            //$user = Model_User::find_by_screen_name($twitter_user->screen_name);
            $user = Model_User::find_one_by('screen_name', $twitter_user->screen_name, '=');
            $data['user'] = $user;
            return Response::forge(View::forge('scds/home', $data));
            */
        }
    }

    public function action_logout()
    {
        $user = Session::get('user');
        if ($user) {
            Cache::delete('idstr_' . $user->tuserid);
            Cache::delete('followers_' . $user->tuserid);
            Log::warning('cache delete idstr_' . $user->tuserid . ' followers_' . $user->tuserid);
        }
        //Cache::delete_all();
        Session::destroy();
        //Response::redirect(Uri::create('/'));
        $data = array();
        //return Response::forge(View::forge('scds/login', $data));
        Response::redirect(Uri::create('login'));
    }

    public function action_callback()
    {
        $tokens = Twitter::get_tokens();
        $twitter_user = Twitter::get('account/verify_credentials');
        $timestr = Date::forge()->format('mysql');

        //認証キャンセル
        if (! $twitter_user) {
            Response::redirect(Uri::create('login'));
        }
        // Update or create the user.  We update every time a user logs in
        // so that if they update their profile, we get that update.
        //$user = Model_User::find_one_by('screen_name', $twitter_user->screen_name, '=');
        $user = Model_User::find_one_by('tuserid', $twitter_user->id, '=');
        $is_new_user = false;
        if ( ! $user)
        {
            $user = new Model_User();
            $is_new_user = true;
        }
        $user->screen_name = $twitter_user->screen_name;
        $user->name = $twitter_user->name;
        $user->description = $twitter_user->description;
        $user->avator = $twitter_user->profile_image_url;
        $user->oauth_token = $tokens['oauth_token'];
        $user->oauth_token_secret = $tokens['oauth_token_secret'];
        $user->credit_color = 1;
        //if (!$twitter_user->followers_count) {
        //    $twitter_user->followers_count = 0;
        //}
        $user->followers_count = $twitter_user->followers_count;
        if ($is_new_user) {
            $user->tuserid = $twitter_user->id;
            $user->social_credit = $twitter_user->followers_count;
            $user->deposit_credit = 0;
            $user->deposited_credit = 0;
            $user->total_credit = $user->social_credit + $user->deposited_credit;
            $user->is_show_help = false;
        }
        // デポジットを先行でユーザ作成行われた場合
        if ($user->social_credit == 0) {
            $user->social_credit = $user->followers_count;
            $user->deposit_credit = 0;
            $user->total_credit = $user->social_credit + $user->deposited_credit;
            $user->is_show_help = false;
        }

        $showhelp = false;
        if (!$user->is_show_help) {
            $showhelp = true;
            $user->is_show_help = 1;
        }

        $user->save();

        //株価情報を作成
        Boardcommon::addboard($user->tuserid,$user->screen_name,$user->social_credit,$user->social_credit,$timestr);

        Session::set('user_id', $user->user_id);
        Session::set('user', $user);

        $data = array();
        $data['user'] = $user;
        if ($showhelp) {
            Response::redirect(Uri::create('help'));
        } else {
            Response::redirect(Uri::create('home'));
        }
    }
}
