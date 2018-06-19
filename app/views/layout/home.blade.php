<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>{{ Config::get('wonderlist.name') }}</title>
	<meta name="description" content="">
	<meta name="keywords" content="">    

	{{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css') }}
	{{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}
	{{ HTML::style('/assets/css/guest.css') }}

	@if( isset($styles['head']) )
		@foreach ($styles['head'] as $style)
			{{ HTML::style($style) }}
		@endforeach
	@endif  
</head>

<body class="home">
	<nav class="navbar navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">
					<img src="{{ URL::asset('assets/img/header_logo.png') }}">
				</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::check())		
						<li class="active">
							<a class="navbar-auth" href="{{ URL::route('user.me') }}">
								<img class="avatar-icon" src="{{ empty($identity->image) ? URL::asset('assets/img/avatar.png') : URL::asset(USER_IMAGE_URL . DIRECTORY_SEPARATOR . $identity->id . DIRECTORY_SEPARATOR . $identity->image) }}"> 
								{{ $identity->first_name }} {{ $identity->last_name }}
								<span class="caret"></span>
							</a>
							<div class="navbar-submenu">
								<ul role="menu">
									@if($identity->role == 'agent')
									<li><a href="{{ URL::route('property.me') }}">Own</a></li>
									@endif
									<li><a href="{{ URL::route('follow.me') }}">Follow</a></li>
									<li><a href="{{ URL::route('nego.me') }}">Nego</a></li>
									<li><a href="{{ URL::route('trans.me') }}">Trans</a></li>
								</ul>
							</div>
						</li>
					@else
						<li>
							<a class="navbar-auth" href="{{ URL::route('user.register') }}">Sign Up</a>
						</li>
						<li>
							<a class="navbar-auth" href="{{ URL::route('user.login') }}">Log In</a>
						</li>						
					@endif
					@if(Auth::check() && $identity->role == 'agent')
					<li>
						<a class="btn" href="{{ URL::route('property.me') }}">Post Listing</a>
					</li>	
					@endif				
				</ul>
			</div>
		</div>
	</nav>

	{{ $body }}

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<img src="{{ URL::asset('assets/img/footer_logo.png') }}">
					<p>&copy; Copyright WonderList {{ date('Y') }}.</p>
					<p>All rights reserved.</p>
				</div>
				<div class="col-sm-8 sitemap">
					<div class="row">
						<div class="col-sm-3">		
							<h5>About</h5>
							<ul>
								<li><a href="{{ URL::route('contact') }}">Contact Us</a></li>
								<li><a href="{{ URL::route('terms') }}">Terms of Use</a></li>
								<li><a href="{{ URL::route('terms') }}">Privacy Policy</a></li>
								<li><a href="{{ URL::route('user.register') }}">Register Account</a></li>
								<li><a href="{{ URL::route('user.login') }}">Sign In Account</a></li>
								<li><a href="{{ URL::route('property.me') }}">Post Listing</a></li>
							</ul>
						</div>
						<div class="col-sm-3">		
							<h5>Download</h5>
							<ul>
								<li><a href="https://itunes.apple.com/us/app/wonderlist/id985884500" target="_blank">Apple AppStore</a></li>
								<li><a href="https://play.google.com/store/apps/details?id=com.wonderlist.property" target="_blank">Google Play</a></li>
							</ul>						
						</div>
						<div class="col-sm-3">		
							<h5>Search</h5>
							<ul>
                                <li><a href="{{ URL::route('property.list', array('category' => 'Sales')) }}">For Sales</a></li>
								<li><a href="{{ URL::route('property.list', array('category' => 'Rent')) }}">For Rent</a></li>
								<li><a href="{{ URL::route('property.list', array('category' => 'New')) }}">New Property</a></li>
							</ul>						
						</div>
						<div class="col-sm-3">		
						
						</div>																		
					</div>			
				</div>
			</div>
		</div>
	</footer>	

	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
	{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js') }}

	@if( isset($scripts['inline']) )
		@foreach ($scripts['inline'] as $script)
			{{ HTML::script($script) }}
		@endforeach
	@endif

	@if( isset($styles['inline']) )
		@foreach ($styles['inline'] as $style)
			{{ HTML::style($style) }}
		@endforeach
	@endif
</body>
</html>
