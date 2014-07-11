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
        Session::destroy();
        //Response::redirect(Uri::create('/'));
        $data = array();
        return Response::forge(View::forge('scds/login', $data));
    }

    public function action_callback()
    {
        $tokens = Twitter::get_tokens();
        $twitter_user = Twitter::get('account/verify_credentials');

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
        $user->followers_count = $twitter_user->followers_count;
        if ($is_new_user) {
            $user->tuserid = $twitter_user->id;
            $user->social_credit = $user->followers_count;
            $user->deposit_credit = 0;
            $user->deposited_credit = 0;
        }
        $user->save();

        Session::set('user_id', $user->user_id);

        $data = array();
        $data['user'] = $user;
        //$data['screen_name'] = $twitter_user->screen_name;
        //Response::redirect(Uri::create('/'));
        Response::redirect(Uri::create('home'));
        //return Response::forge(View::forge('scds/home', $data));
    }
}
