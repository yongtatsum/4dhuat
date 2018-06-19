<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T8J8N7R');</script>
        <!-- End Google Tag Manager -->
        <meta property='og:type' content="website"/>
    <meta property='og:title' content="4d"/>

    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta name="keywords" content="万字 神字 万字成绩 测字 toto toto成绩 result magnum magnum成绩 damacai Singapore 4D Lotto88 Sandakan STC CashSweep"/>
    <meta name="description" content="查萬字？沒煩惱！！祝你發 發 發"/>
    <meta property='og:title' content="4D發 Huat!"/>
    <meta property="og:description" content="{{ (Request::is('sudoku') ? '下期万字四宫格' : '查萬字？沒煩惱！！祝你發 發 發') }}"/>
    <meta property="fb:app_id" content="189846661513289"/>
    <meta property="og:url" content="https://www.fourdhuat.com"/>
    <meta property="og:site_name" content="4D發 Huat!"/>
    <meta property='og:type' content="website"/>
    <meta property="og:image" content="{{ URL::asset('assets/images/4dhuat/banner.jpg') }}"/>
    <meta property="og:image:secure_url" content="{{ URL::asset('assets/images/4dhuat/banner.jpg') }}"/>
    <meta property="og:title:secure_url" content="4D發 Huat!"/>

    <meta name="juicyads-site-verification" content="bc3dc52eb8fdecfd4840a56cb6183994">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ URL::asset('assets/images/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('assets/images/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ URL::asset('assets/images/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#efefef">

	


	<title>{{ Config::get('4dhuat.name') }}</title>
  

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	{{ HTML::style('/assets/css/app.css') }}

</head>

<body style="background: #efefef">
    <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '189846661513289',
            xfbml      : true,
            version    : 'v2.8'
          });
          FB.AppEvents.logPageView();
        };

        (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/en_US/sdk.js";
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96460204-1', 'auto');
  ga('send', 'pageview');

</script>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T8J8N7R"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

        <a class="navbar-brand" href="{{ URL::route('home') }}" style="padding:8px">
              
        <img style="width:40px;heigh:40px" alt="{{ Config::get('4dhuat.name') }}" src="{{ URL::asset('assets/images/4dhuat/ic_launcher_m.png') }}">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li {{ (Request::is('/') ? 'class="active"' : '') }} ><a href="{{ URL::route('home',['platform'=>'bizStore']) }}">首页 </a></li>
        <li {{ (Request::is('dates') ? 'class="active"' : '') }}><a href="{{ URL::route('dates',['platform'=>'bizStore']) }}">以往开彩成绩</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">测字 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            
             <li {{ (Request::is('myNumber') ? 'class="active"' : '') }} ><a href="{{ URL::route('myNumber',['platform'=>'bizStore'])}}">我的神字</a></li>
             <li role="separator" class="divider"></li>
             <li {{ (Request::is('sudoku') ? 'class="active"' : '') }} ><a href="{{ URL::route('sudoku',['platform'=>'bizStore'])}}">万字四宫格</a></li>
             <li {{ (Request::is('analytics') ? 'class="active"' : '') }} ><a href="{{ URL::route('analytics',['platform'=>'bizStore'])}}">频密出现万字分析</a></li>

          </ul>
        </li>
        <li {{ (Request::is('tbg') ? 'class="active"' : '') }} ><a href="{{ URL::route('tbg',['platform'=>'bizStore']) }}">大伯公千字图</a></li>

      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
    <div class="container">

    {{ $body }}
    <div class="row footer navbar-fixed-bottom" style="background-color: white;padding: 5px">
        <div class="col-xs-12">
            <center>
                <button class="btn btn-warning" onclick="pay()" style="margin-top: 5px;width: 80%">Donate</button>
                <p id="result_text"></p>
            </center>    
        </div>

    </div>
   </div>


  <!-- The Modal -->
<div id="androidModal" class="modal" style="padding-top: 100px;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.9)">

  <!-- The Close Button -->
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <center><a href="https://play.google.com/store/apps/details?id=com.solution.flyhigh.fourdhuat"><img class="modal-content" style="width:80%;max-width:500px;height:auto" src="{{ URL::asset('assets/images/4dhuat/banner.jpg') }}" ></center></a>

  <!-- Modal Caption (Image Text) -->
  <div id="caption">获得更火神字, 下载 <a href="https://play.google.com/store/apps/details?id=com.solution.flyhigh.fourdhuat">Android app </a> 吧!</div>
</div>
	  <script src="https://cdn.bizstore.io/bizapp-0.0.2.min.js"></script>

<script>

function open() {
   
//  if(getMobileOperatingSystem()=='Android'){
//        
//        $('#androidModal').modal('show');
//    }
}


function getMobileOperatingSystem() {
  var userAgent = navigator.userAgent || navigator.vendor || window.opera;

  if( userAgent.match( /iPad/i ) || userAgent.match( /iPhone/i ) || userAgent.match( /iPod/i ) )
  {
    return 'iOS';

  }
  else if( userAgent.match( /Android/i ) )
  {

    return 'Android';
  }
  else
  {
    return 'unknown';
  }
}

window.onload = open;

var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
$('#androidModal').modal('hide');
}
</script>
  <script>
  function pay() {
    var options = {
      address: "yewLaSjEiziHhqgRwmyTomMNfiQm9h4SNM",
      amount: 100000000, // 1 TRVC
      message: "Payment for BizApp",
      identifier: "446f7261"
    };

    BizApp.payToWallet(options, function(error, result) {
      
      if (error) {
        $("#result_text").text("Payment failed: " + error);
      } else {
        $("#result_text").text("Payment success: " + JSON.stringify(result));
        // You can send to backend for verification
        $.post("https://mybizapp.com:3000/api/verify",
          { trxId: result.txId, toAddress: result.toAddress, amount: result.amount },
          function() { });
      }
    });
  }
</script>
		

</body>
</html>
