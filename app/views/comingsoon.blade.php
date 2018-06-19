<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="Bidoboo" content="Bidoboo" />
    <meta name="description" content="Bidoboo is Malaysia honest and fair bidding website. We provide hot and trend items for you to bid.  Everyday will give you a surprise!"/>
    <meta name="keywords" content="Bidoboo, auction, grab, malaysia bidding, game-shopping, social shopping, entertainment shopping, budget, low cost, gadgets, smartphones, laptop, camera, electronics, fashion, collectibles, coupons"/>
    <meta name="google-site-verification" content="0y8BsqojXo9onxLSRXtM46Vrdh9zDGRANsBetESrRqg" />
    <meta property="og:url" content="https://bidoboo.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Bidoboo | Let's Start to Bid" />
    <meta property="og:description" content="Bidoboo is Malaysia honest and fair bidding website. We provide hot and trend items for you to bid.  Everyday will give you a surprise!" />
    <meta property="og:image" content="{{ URL::asset('assets/images/bidoboo_fb.png') }}" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{ URL::asset('assets/css/responsive.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/plugins.js')}}"></script>

	<!-- Document Title
	============================================= -->
	<title>Coming Soon | Bidoboo</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="no-sticky transparent-header dark">

			<div id="header-wrap">

				<div class="container clearfix">

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="{{ URL::asset('assets/images/bidoboo_logo.png') }}"><img src="{{ URL::asset('assets/images/bidoboo_logo.png') }}" alt="Bidoboo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="{{ URL::asset('assets/images/bidoboo_logo.png') }}"><img src="{{ URL::asset('assets/images/bidoboo_logo.png') }}" alt="Bidoboo"></a>
					</div><!-- #logo end -->

					
				</div>

			</div>

		</header><!-- #header end -->

		<section id="slider" class="full-screen dark" style="background: url({{ URL::asset('assets/images/bidobooBG.jpg') }}) center;">

			<div class="container clearfix vertical-middle">

				<div class="heading-block title-center nobottomborder">
					<h1>We are currently Under Construction</h1>
					<span>Please check back again within Some Days as We're Pretty Close</span>
				</div>

				<div id="countdown-ex1" class="countdown countdown-large coming-soon divcenter bottommargin" style="max-width:700px;"></div>

				<div class="divider divider-center divider-short divider-margin"><i class="icon-time"></i></div>


				<script>
					jQuery(document).ready( function($){
						var newDate = new Date(2017, 0, 31);
						$('#countdown-ex1').countdown({until: newDate});
					});
					
				</script>

			</div>

		</section>

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="{{ URL::asset('assets/js/functions.js')}}"></script>

</body>
</html>