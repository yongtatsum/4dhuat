<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>{{ Config::get('wonderlist.name') }}</title>
	<meta name="description" content="">
	<meta name="keywords" content="">    

	{{ HTML::style('/assets/css/bootstrap.min.css') }}
    {{ HTML::style('/assets/css/font-awesome.css') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,300,500') }}
	{{ HTML::style('/assets/css/guest.min.css?ver=0.3') }}

	@if( isset($styles['head']) )
	@foreach ($styles['head'] as $style)
	{{ HTML::style($style) }}
	@endforeach
	@endif  
</head>

<body>
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
					<img src="{{ URL::asset('assets/img/header_logo_green.png') }}">
				</a>
			</div>
		</div>
	</nav>

	{{ $body }}

	<footer>
		<div class="container">
			<div class="row">
				<div style="text-align:center;">
					<img src="{{ URL::asset('assets/img/footer_logo.png') }}">
					<p>&copy; Copyright WonderList {{ date('Y') }}.</p>
					<p>All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>	

	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
	{{ HTML::script('/assets/js/bootstrap.min.js') }}

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
