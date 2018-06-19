
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
       console.log(response.authResponse.accessToken);
      login(response.authResponse.accessToken);
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
      
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '189846661513289',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function login(access_token) {
    console.log('Welcome!  Fetching your information.... ');
    
                   $.ajax({
                        type: "POST",
                        url : '{{ route("FbConnect") }}',
                        dataType: 'json',
                        data: {access_token: access_token},
                        success:function(data){
                                console.log(data);
                                window.location.href = "/";
                        },
                        error: function(xhr, stt, err){
                            console.log(xhr);
                        }
                });
//    FB.api('/me', function(response) {
//         console.log(response);
//      console.log('Successful login for: ' + response.name);
//      document.getElementById('status').innerHTML =
//        'Thanks for logging in, ' + response.name + '!';
//    });
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->



<div class="row">

    <div class="col-xs-12 col-md-6 col-md-offset-3" style="background: #daedf9;padding:25px">
     
      <center>
           <h3>为什么需要脸书登入？</h3>
           <h4>当您中奖时，我们的客服人员会较容易联系到您。</h4>
           
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>

      </center>
      
    </div>
    <div class="col-xs-6 col-md-3"> 
      <center>
             <!-- JuicyAds v3.0 -->
            <script async src="//adserver.juicyads.com/js/jads.js"></script>
            <ins id="574545" data-width="160" data-height="612"></ins>
            <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574545});</script>
            <!--JuicyAds END-->
            
             <!-- JuicyAds v3.0 -->
                <script async src="//adserver.juicyads.com/js/jads.js"></script>
                <ins id="574544" data-width="125" data-height="137"></ins>
                <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574544});</script>
                <!--JuicyAds END-->
                          <!-- JuicyAds v3.0 -->
                <script async src="//adserver.juicyads.com/js/jads.js"></script>

                <ins id="574541" data-width="728" data-height="102"></ins>
                <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574541});</script>
                <!--JuicyAds END-->
                 <script async src="//adserver.juicyads.com/js/jads.js"></script>
        <ins id="574540" data-width="250" data-height="262"></ins>
        <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574540});</script>
        <!--JuicyAds END-->
        </center>
  
  
  </div>
