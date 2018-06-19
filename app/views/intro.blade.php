<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    {{ HTML::style('/assets/css/bootstrap.css') }}
    {{ HTML::style('/assets/css/style.css') }}
    {{ HTML::style('/assets/css/dark.css') }}
    {{ HTML::style('/assets/css/font-icons.css') }}
    {{ HTML::style('/assets/css/animate.css') }}
    {{ HTML::style('/assets/css/magnific-popup.css') }}
    {{ HTML::style('/assets/css/responsive.css') }}
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- Document Title
	============================================= -->
	<title>Bidoboo</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="transparent-header page-section dark">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="{{ URL::asset('assets/images/bidoboo-dark.png') }}"><img src="{{ URL::asset('assets/images/logo.png') }}" alt="Bidoboo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="{{ URL::asset('assets/images/bidoboo-dark@2x.png') }}"><img src="{{ URL::asset('assets/images/logo@2x.png') }}" alt="Bidoboo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul class="one-page-menu">
							<li class="current"><a href="#" data-href="#header"><div>Home</div></a></li>
							<li><a href="#" data-href="#section-about"><div>About</div></a></li>
							<li><a href="#" data-href="#section-explore"><div>Explore</div></a></li>
							<li><a href="#" data-href="#section-features"><div>Features</div></a></li>
							<li><a href="#" data-href="#section-download"><div>Download</div></a></li>
						</ul>

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<section id="slider" class="full-screen slider-parallax">
			<div class="slider-parallax-inner" style="background: url('{{ URL::asset('assets/images/bg.jpg') }}') center center no-repeat; background-size: cover;">
				<div class="vertical-middle" style="z-index: 2;">
					<div class="container dark clearfix">
						<div class="row clearfix">
							<div class="col-md-6 col-sm-8">
								<div class="emphasis-title">
									<h1 class="font-body">Beautiful Websites.<br>Increased Conversions.</h1>
								</div>
									<a href="#" data-scrollto="#section-download" data-easing="easeInOutExpo" data-speed="1250" data-offset="160" class="button button-desc button-border button-light button-rounded nomargin" style="padding:20px 25px;"><i class="icon-apple"></i><div><span style="margin-top:0px;margin-bottom:10px;">Available on the</span>App Store</div></a>
								<a href="#" data-scrollto="#section-download" data-easing="easeInOutExpo" data-speed="1250" data-offset="160" class="button button-desc button-border button-light button-rounded nomargin" style="padding:20px 25px;"><i class="icon-android"></i><div><span style="margin-top:0px;margin-bottom:10px;">Android App On</span>Google Play</div></a>
							</div>
						</div>
					</div>
				</div>
				<div class="video-wrap" style="position: absolute; height: 100%; z-index: 1;">
					<div class="video-overlay" style="background: rgba(0,0,0,0.2);"></div>

				</div>
			</div>
		</section>

		<!-- Page Sub Menu
		============================================= -->
		<div id="page-menu" class="dots-menu">

			<div id="page-menu-wrap">

				<div class="container clearfix">

					<div class="menu-title">Explore <span>BIDOBOO</span></div>

					<nav class="one-page-menu no-offset">
						<ul>
							<li><a href="#" data-href="#header"><div>Home</div></a></li>
							<li><a href="#" data-href="#section-about"><div>About</div></a></li>
							<li><a href="#" data-href="#section-explore"><div>Explore</div></a></li>
							<li><a href="#" data-href="#section-features"><div>Features</div></a></li>
							<li><a href="#" data-href="#section-download"><div>Download</div></a></li>
						</ul>
					</nav>

				<div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

				</div>

			</div>

		</div><!-- #page-menu end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<section id="section-about" class="page-section section nobg nomargin">
					<div class="container clearfix">

                        <div class="col_one_third nobottommargin center">
                            <a href="#"><img src="{{ URL::asset('assets/images/s1.png') }}" alt="Image" class="bottommargin-sm"></a>
                            <h4>Responsive Layout</h4>
                            <p>Powerful Layout with Responsive functionality that can be adapted to any screen size. Resize browser to view.</p>
                        </div>
    
                        <div class="col_one_third nobottommargin center">
                            <a href="#"><img src="{{ URL::asset('assets/images/s4.png') }}" alt="Image" class="bottommargin-sm"></a>
                            <h4>Retina Ready Graphics</h4>
                            <p>Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Retina Icons, Fonts &amp; all others graphics are optimized.</p>
                        </div>
    
                        <div class="col_one_third nobottommargin center col_last">
                            <a href="#"><img src="{{ URL::asset('assets/images/s5.png') }}" alt="Image" class="bottommargin-sm"></a>
                            <h4>Powerful Performance</h4>
                            <p>Canvas includes tons of optimized code that are completely customizable and deliver unmatched fast performance.</p>
                        </div>
    
                    </div>

				</section>

				<section id="section-explore" class="page-section section nomargin">
                
                        <div class="container clearfix">
    
                            <div class="col_half nobottommargin topmargin-lg">
    
                                <img src="{{ URL::asset('assets/images/iphone-solid.png') }}" alt="Image" class="center-block">
    
                            </div>
    
                            <div class="col_half nobottommargin topmargin-lg col_last">
    
                                <div class="heading-block topmargin-lg">
                                    <h2>Typically Responsive</h2>
                                    <span>Our App scales beautifully to different Devices.</span>
                                </div>
    
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet cumque, perferendis accusamus porro illo exercitationem molestias, inventore obcaecati ut omnis voluptatibus ratione odio amet magnam quidem tempore necessitatibus quaerat, voluptates excepturi voluptatem, veritatis qui temporibus.</p>
    
                                <a href="#" class="button button-border button-rounded button-large button-dark noleftmargin">View Gallery</a>
    
                            </div>
                            
                            <div class="divider divider-center"><i class="icon-circle"></i></div>
                            <div class="clear"></div>
    
                        </div>
                        
                        
                        <div class="container clearfix">
    
                            <div class="col_half nobottommargin topmargin-lg">
    
                                <div class="heading-block topmargin-lg">
                                    <h2>Typically Responsive</h2>
                                    <span>Our App scales beautifully to different Devices.</span>
                                </div>
    
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet cumque, perferendis accusamus porro illo exercitationem molestias, inventore obcaecati ut omnis voluptatibus ratione odio amet magnam quidem tempore necessitatibus quaerat, voluptates excepturi voluptatem, veritatis qui temporibus.</p>
    
                                <a href="#" class="button button-border button-rounded button-large button-dark noleftmargin">Start Trial</a>
    
                            </div>
    
                            <div class="col_half nobottommargin topmargin-lg col_last">
                            
                                <img src="{{ URL::asset('assets/images/iphone-solid.png') }}" alt="Image" class="center-block">
                                
                            </div>
                            
                            <div class="divider divider-center"><i class="icon-circle"></i></div>
                            <div class="clear"></div>
    
                        </div>

                        
                        
                        <div class="container clearfix">
    
                            <div class="col_half nobottommargin topmargin-lg">
    
                                <img src="{{ URL::asset('assets/images/iphone-solid.png') }}" alt="Image" class="center-block">
    
                            </div>
    
                            <div class="col_half nobottommargin topmargin-lg col_last">
    
                                <div class="heading-block topmargin-lg">
                                    <h2>Typically Responsive</h2>
                                    <span>Our App scales beautifully to different Devices.</span>
                                </div>
    
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet cumque, perferendis accusamus porro illo exercitationem molestias, inventore obcaecati ut omnis voluptatibus ratione odio amet magnam quidem tempore necessitatibus quaerat, voluptates excepturi voluptatem, veritatis qui temporibus.</p>
    
                                <a href="#" class="button button-border button-rounded button-large button-dark noleftmargin">View Gallery</a>
    
                            </div>
    
                        </div>


				</section>

				<section id="section-features" class="page-section section dark nomargin" style="background-color: #222;">
					<div class="container clearfix">

                        <div id="section-features" class="heading-block title-center page-section">
                            <h2>Features Overview</h2>
                            <span>Some of the Features that are gonna blow your mind off</span>
                        </div>
    
                        <div class="col_one_third">
                            <div class="feature-box fbox-plain">
                                <div class="fbox-icon" data-animate="bounceIn">
                                    <a href="#"><img src="{{ URL::asset('assets/images/responsive.png') }}" alt="Responsive Layout"></a>
                                </div>
                                <h3>Responsive Layout</h3>
                                <p>Powerful Layout with Responsive functionality that can be adapted to any screen size. Resize browser to view.</p>
                            </div>
                        </div>
    
                        <div class="col_one_third">
                            <div class="feature-box fbox-plain">
                                <div class="fbox-icon" data-animate="bounceIn" data-delay="200">
                                    <a href="#"><img src="{{ URL::asset('assets/images/retina.png') }}" alt="Retina Graphics"></a>
                                </div>
                                <h3>Retina Graphics</h3>
                                <p>Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Retina Icons, Fonts &amp; all others graphics are optimized.</p>
                            </div>
                        </div>
    
                        <div class="col_one_third col_last">
                            <div class="feature-box fbox-plain">
                                <div class="fbox-icon" data-animate="bounceIn" data-delay="400">
                                    <a href="#"><img src="{{ URL::asset('assets/images/performance.png') }}" alt="Powerful Performance"></a>
                                </div>
                                <h3>Powerful Performance</h3>
                                <p>Canvas includes tons of optimized code that are completely customizable and deliver unmatched fast performance.</p>
                            </div>
                        </div>
    
                        <div class="clear"></div>
    
                        <div class="col_one_third">
                            <div class="feature-box fbox-plain">
                                <div class="fbox-icon" data-animate="bounceIn" data-delay="600">
                                    <a href="#"><img src="{{ URL::asset('assets/images/flag.png') }}" alt="Responsive Layout"></a>
                                </div>
                                <h3>Endless Possibilities</h3>
                                <p>You have complete easy control on each &amp; every element that provides endless customization possibilities.</p>
                            </div>
                        </div>
    
                        <div class="col_one_third">
                            <div class="feature-box fbox-plain">
                                <div class="fbox-icon" data-animate="bounceIn" data-delay="800">
                                    <a href="#"><img src="{{ URL::asset('assets/images/tick.png') }}" alt="Retina Graphics"></a>
                                </div>
                                <h3>Light &amp; Dark Scheme</h3>
                                <p>Change your Website's Primary Scheme instantly by simply adding the dark class to the body.</p>
                            </div>
                        </div>
    
                        <div class="col_one_third col_last">
                            <div class="feature-box fbox-plain">
                                <div class="fbox-icon" data-animate="bounceIn" data-delay="1000">
                                    <a href="#"><img src="{{ URL::asset('assets/images/tools.png') }}" alt="Powerful Performance"></a>
                                </div>
                                <h3>Customizable Fonts</h3>
                                <p>Use any Font you like from Google Web Fonts, Typekit or other Web Fonts. They will blend in perfectly.</p>
                            </div>
                        </div>
    
                        <div class="clear"></div>
    
                        <div class="col_one_third">
                            <div class="feature-box fbox-plain">
                                <div class="fbox-icon" data-animate="bounceIn" data-delay="1200">
                                    <a href="#"><img src="{{ URL::asset('assets/images/map.png') }}" alt="Responsive Layout"></a>
                                </div>
                                <h3>Responsive Layout</h3>
                                <p>Powerful Layout with Responsive functionality that can be adapted to any screen size. Resize browser to view.</p>
                            </div>
                        </div>
    
                        <div class="col_one_third">
                            <div class="feature-box fbox-plain">
                                <div class="fbox-icon" data-animate="bounceIn" data-delay="1400">
                                    <a href="#"><img src="{{ URL::asset('assets/images/seo.png') }}" alt="Retina Graphics"></a>
                                </div>
                                <h3>Retina Graphics</h3>
                                <p>Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Retina Icons, Fonts &amp; all others graphics are optimized.</p>
                            </div>
                        </div>
    
                        <div class="col_one_third col_last">
                            <div class="feature-box fbox-plain">
                                <div class="fbox-icon" data-animate="bounceIn" data-delay="1600">
                                    <a href="#"><img src="{{ URL::asset('assets/images/support.png') }}" alt="Powerful Performance"></a>
                                </div>
                                <h3>Powerful Performance</h3>
                                <p>Canvas includes tons of optimized code that are completely customizable and deliver unmatched fast performance.</p>
                            </div>
                        </div>
    
                        <div class="clear"></div>
                    </div>
                    
				</section>


				<section id="section-download" class="page-section nobg section nomargin">
					
                    <div class="container clearfix">

                        <div class="heading-block center">
                            <h3>Available on all Major Platforms.</h3>
                            <span>We have made our App available on all Major Platforms</span>
                        </div>
    
                        <p class="divcenter center" style="max-width: 800px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo animi ab dolorem deleniti, incidunt, recusandae tenetur eius aut similique delectus nisi labore odit temporibus reprehenderit eum iure natus voluptatem commodi? Quam ea, placeat quia et dignissimos laboriosam unde earum repudiandae?</p>
    
                        <div class="col_full center topmargin nobottommargin">
    
                            <a href="#" class="social-icon si-appstore si-large si-rounded si-colored inline-block" title="iOS App Store">
                                <i class="icon-appstore"></i>
                                <i class="icon-appstore"></i>
                            </a>
    
                            <a href="#" class="social-icon si-android si-large si-rounded si-colored inline-block" title="Android Store">
                                <i class="icon-android"></i>
                                <i class="icon-android"></i>
                            </a>
    
                            <a href="#" class="social-icon si-gplus si-large si-rounded si-colored inline-block" title="Windows Store">
                                <i class="icon-windows3"></i>
                                <i class="icon-windows3"></i>
                            </a>
    
                        </div>
    
                        <?php /*?><div class="clear"></div>
    
                        <div class="divider divider-short divider-vshort divider-line divider-center">&nbsp;</div>
    
                        <div class="heading-block center">
                            <h3>Subscribe for more <span>Updates</span>.</h3>
                        </div>
    
                        <div class="subscribe-widget">
                            <div class="widget-subscribe-form-result"></div>
                            <form id="widget-subscribe-form2" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                                <div class="input-group input-group-lg divcenter" style="max-width:600px;">
                                    <span class="input-group-addon"><i class="icon-email2"></i></span>
                                    <input type="email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Subscribe Now</button>
                                    </span>
                                </div>
                            </form>
                        </div><?php */?>
    
                    </div>

				</section>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2017 All Rights Reserved by Bidoboo.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="https://www.facebook.com/bidobooComunities" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i> support@bidoboo.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +603 8052 0015
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
    {{ HTML::script('/assets/js/jquery.js') }}
    {{ HTML::script('/assets/js/plugins.js') }}

	<!-- Footer Scripts
	============================================= -->
    {{ HTML::script('/assets/js/functions.js') }}
	
</body>
</html>