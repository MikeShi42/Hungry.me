<div id="navbar">
    <!--LOGO-->
    <img id="logo" src="assets/hungry.me_logo_main.png">
    <!--SIGN IN/USER-->
	@if (Auth::check())
	<div id="user">
            <div id="user-name">{{ Session::get('fbObject')['name'] }}</div>
            <div id="profile-picture" style="background: url('http://graph.facebook.com/{{ Session::get('fbObject')['id'] }}/picture')"></div>
    </div>
	@else
    <div id="sign-in"><a href="login">SIGN IN</a></div>
	@endif
</div>