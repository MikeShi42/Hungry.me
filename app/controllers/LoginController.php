<?php

class LoginController extends BaseController
{
	function FacebookRedirect()
	{
		$facebook = new Facebook(Config::get('facebook'));
		$params = array(
			'redirect_uri' => url('/login/fb/callback'),
			'scope' => 'email',
			);
		return Redirect::to($facebook->getLoginUrl($params));
	}

	function FacebookCallback()
	{
		$code = Input::get('code');
		if(strlen($code) == 0) return Redirect::to('/')->with('message', 'Error communicating with Facebook'); //TODO error page
		
		$facebook = new Facebook(Config::get('facebook'));
		$uid = $facebook->getUser();
		if($uid == 0) return Redirect::to('/')->with('message', 'Error'); //TODO error page
		
		$me = $facebook->api('/me');
		$user = User::where('fbID', '=', $uid)->first();
		if(empty($user))
		{
			$user = new User;
			$user->firstName = $me['first_name'];
			$user->lastName = $me['last_name'];
			$user->fbID = $uid;
			$user->save();
		}
		Auth::login($user);
		return Redirect::to('/')->with('message', 'Logged in with Facebook');
	}
}