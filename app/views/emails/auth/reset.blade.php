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
    <title>Bidoboo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  </head>
  <body style="background: #f6f6f6; color: #403e47; margin: 0; padding: 0;">

       <div class="content" style="border-spacing: 0; margin: 0 auto; max-width: 500px;">
                      
                        <h2 style="color: #403e47; font-size: 18px;text-align: left">Password reset </h2>
                        <p style="color: #403e47; font-size: 15px; ;text-align: left">Your new password reset link  <strong><a href="{{ route('auth.reset', array( 'token' =>$remember_token )) }}">click here</a> </strong> </p>
                      <p style="border-top: 1px dashed #dcdcdc;"></p>
       </div>
  </body>
</html>