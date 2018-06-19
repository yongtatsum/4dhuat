<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
//    if( ! Request::secure())
//    {
//        return Redirect::secure(Request::path());
//    }
    
//    $language = Session::get('language','en'); //en will be the default language.
//    App::setLocale($language);
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth.admin', function() {
	if (Auth::guest()) {
		if (Request::ajax()) {
			return Response::make('Unauthorized', 401);
		} else {
			return Redirect::guest('/admin/login');
		}
	}
	else {
		if(Auth::user()->role == 'admin')
		{
			
		}
		else 
		{
			return Response::make('Unauthorized', 401);
		}
	}
});
Route::filter('auth.adminOnly', function() {
        if (Auth::guest()) {
		if (Request::ajax()) {
			return Response::make('Unauthorized', 401);
		} else {
			return Redirect::guest('/admin/login');
		}
	}
	else {
		if(Auth::user()->role->name_en == 'Administrator')
		{
			
		}
		else 
		{
			return Response::make('Unauthorized', 401);
		}
	}
});
Route::filter('auth.user', function() {
	if (Auth::guest()) {
		if (Request::ajax()) {
			return Response::make('Unauthorized', 401);
		} else {
                    
                    return Redirect::to(URL::route('login'));
		}
	}
});

Route::filter('auth.api', function() {
	if (Auth::guest()) {
		$jsonResponse = new JsonResponse();  
        $jsonResponse->setCode(401);
        $jsonResponse->setSubject('Unauthorized');		
        return $jsonResponse
            ->get()
        ;     
	}
});

 Route::filter('auth.basic', function() {
 	return Auth::basic();
 });

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{	
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

// Route::filter('csrf', function()
// {
	// if (Session::token() !== Input::get('_token'))
	// {
	// 	throw new Illuminate\Session\TokenMismatchException;
	// }
// });



 Route::filter('auth.basic', function() {
     
//      if( ! Request::secure())
//    {
//        return Redirect::secure(Request::path());
//    }
    
     if(Auth::check() && Auth::user()->role != 'administrator')
 	return Auth::basic();
     
     return Auth::basic();
 });
 
Route::filter('force.ssl', function()
{
    if( ! Request::secure())
    {
        return Redirect::secure(Request::path());
    }

});