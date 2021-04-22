<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Marktplaats</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href="/css/default.css" rel="stylesheet" />
    <link href="/css/fonts.css" rel="stylesheet" />
    @yield ("style")
    @yield ("script")
</head>
<body>
    <div id="header-wrapper">
	    <div id="header" class="container">
		    <div id="logo">
			    <h1><a href = "{{ route('ads.index') }}">Marktplaats</a></h1>
		    </div>
		    <div id="menu">
                @guest
                    <ul>
                        <li class="{{ Request::is('ads') ? 'current_page_item' : '' }}">
                            <a href = "{{ route('ads.index') }}" accesskey="1" title = "Homepage">Homepage</a>
                        </li>

                        <li class="{{ Request::is('login/create') ? 'current_page_item' : '' }}">
                            <a href="{{ route('login.create') }}" accesskey="2" title="Login">Login</a>
                        </li>

                        <li class="{{ Request::is('register/create') ? 'current_page_item' : '' }}">
                            <a href="{{ route('register.create') }}" accesskey="3" title="Register">Register</a>
                        </li>
                    </ul>
                @endguest
                @auth
                    <ul>
                        <li class="{{ Request::is('ads') ? 'current_page_item' : '' }}">
                            <a href = "{{ route('ads.index') }}" accesskey="1" title = "Homepage">Homepage</a>
                        </li>
                        <li class="{{ Request::is('ads/create') ? 'current_page_item' : '' }}">
                            <a href = "{{ route('ads.create') }}" accesskey="2" title = "Create a new ad">Create new ad</a>
                        </li>
                        <li class="{{ Request::is('ads/myAds') ? 'current_page_item' : '' }}">
                            <a href = "{{ route('ads.myAds') }}" accesskey="3" title = "My Ads">My Ads</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">{{ __('Logout') }}</button>
                            </form>
                        </li>
                    </ul>
                @endauth
		    </div>
	    </div>
    </div>
    @yield ("content")
</body>
</html>