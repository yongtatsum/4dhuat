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
	{{ HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,300,500') }}
	{{ HTML::style('/assets/css/guest.css') }}

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
				<a class="navbar-brand" href="http://www.lesystenancy.com/">{{ Config::get('wonderlist.name') }}</a>
			</div>
		</div>
	</nav>

	<div class="page">
		<div class="container">

			
			<h2 class="page-header">Page not found</h2>
			<p>Oops, the page you're looking for does not exist.</p>
			<p>You may want to head back to the homepage. If you think something is broken, report a problem.</p>
			<p><a href="/">Go to Homepage</a> <a href="mailto:admin@wonderlist.property">Report a Problem</a></p>

			<br><br><br><br><br><br>

		</div>
	</div>

	
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
