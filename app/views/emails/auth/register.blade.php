<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		
	</body>
</html>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="background: #f6f6f6; color: #403e47; margin: 0; padding: 0;">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Digico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  </head>
  <body style="background: #f6f6f6; color: #403e47; margin: 0; padding: 0;">
    <table class="wrapper" style="background: #f6f6f6; border-spacing: 0; font-family: 'Source Sans Pro', Arial, Helvetica, sans-serif; width: 100%;">
      <tr class="header" style="background: #2c577f;">
        <td colspan="3">
          <table class="header__wrap" style="border-spacing: 0; margin: 0 auto; max-width: 600px; width: 600px;">
            <tr>
              <td>
                <p class="header__slogan" style="color: #fff; font-size: 13px; font-style: regular;">Welcome to Digico</p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr class="main">
        <td colspan="3"><a href="{{ URL::route('home') }}" class="logo" style="background: url('{{asset('assets/img/chat/digico.png')}}'); color: #403e47; display: block; height: 55px; margin: 50px auto 20px; width: 214px;"><img src="{{asset('assets/img/chat/digico.png')}}" alt="" style="max-width: 100%;"></a>
          <table class="body" style="background: #fff; border-spacing: 0; margin: 0 auto; max-width: 600px;">
            <tr>
              <td colspan="3"><img src="{{asset('assets/img/chat/welcome.jpg')}}" alt="" style="max-width: 100%;"></td>
            </tr>
            <tr>
              <td></td>
              <td>
                  <div class="content" style="border-spacing: 0; margin: 0 auto; max-width: 500px;">
                      
                      <h2 style="color: #403e47; font-size: 18px;">We're glad you've signed up for DigiCo! </h2>
                      <p style="color: #403e47; font-size: 15px; text-align:justify;">To start getting more leads, you just need to add DigiCo to your website. </p>
                      <p style="color: #403e47; font-size: 15px; text-align:justify;">Do that by adding this code (below) to the footer of your website or taking advantage of our <a href="{{ URL::route('home') }}" style="color: #309fd6;">free plugins</a>. Already have Pure Chat installed? Then <a href="{{ URL::route('user.login') }}" style="color: #309fd6;">login now</a>.</p>
                       <p style="color: #403e47; font-size: 15px; border: 1px solid #403e47; padding:20px;">{{ $snippet }}</p>

                      <p style="border-top: 1px dashed #dcdcdc;"></p>
                  </div>
                      
                    
                      
                    
                <table class="content" style="border-spacing: 0; margin: 0 auto; max-width: 500px;">
                  <tr>
                    <td><img src="{{asset('assets/img/chat/help.jpg')}}" alt="" style="width: 110px; height: 110px; padding:0px 20px 20px 0px;"></td>
                    <td><h2 style="color: #403e47; font-size: 18px;">Need a little help?</h2>
                      <p style="color: #403e47; font-size: 15px; text-align:justify; padding-bottom:20px;">Visit our <a href="{{ URL::route('home') }}" style="color: #309fd6;">support page</a> for helpful how-to guides. If you have any questions about the product, or would like to leave us feedback, <a href="{{ URL::route('home') }}" style="color: #309fd6;">chat with our team instantly</a>!</p>
                    </td>
                  </tr>
               </table>
              </td>
              <td></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr class="footer" style="color: #403e47; font-size: 15px; text-align: center;">
        <td colspan="3">
          <p>Email us at: <a href="mailto:help@digico.asia" style="color: #309fd6;">help@digico.asia</a>  -  Visit our website at:  <a href="{{ URL::route('home') }}" style="color: #309fd6;">digico.asia</a></p>
          <p style="font-size:12px;">Copyright &copy; 2016 DigiCo, All rights reserved.</p>
        </td>
      </tr>
    </table>
  </body>
</html>