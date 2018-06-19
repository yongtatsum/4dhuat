<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/intro', array('as' => 'intro', function()
{
    return View::make('hello');
}));


Route::get('/', array(
        'before'=>'force.ssl',
	'as' => 'home',
	'uses' => 'WebController@getIndex'
	));

Route::get('/platform/{platform}', array(
        'before'=>'force.ssl',
	'as' => 'home',
	'uses' => 'WebController@getIndex'
	));

Route::get('/results/{id}', array(
        'before'=>'force.ssl',
	'as' => 'results',
	'uses' => 'WebController@listresults'
	));

Route::get('/dates', array(
        'before'=>'force.ssl',
	'as' => 'dates',
	'uses' => 'WebController@listdates'
	));

Route::get('/sudoku', array(
        'before'=>'force.ssl',
	'as' => 'sudoku',
	'uses' => 'WebController@listSudoku'
	));

Route::get('/myNumber', array(
        'before'=>'force.ssl',
	'as' => 'myNumber',
	'uses' => 'WebController@myNumber'
	));

Route::get('/tbg', array(
        'before'=>'force.ssl',
	'as' => 'tbg',
	'uses' => 'WebController@tbg'
	));

Route::get('/login', array(
        'before'=>'force.ssl',
	'as' => 'login',
	'uses' => 'WebController@login'
	));

Route::get('/fb-callback', array(
	'as' => 'fb-callback',
	'uses' => 'WebController@fbCallback'
	));

Route::get('/analytics', array(
        'before'=>'force.ssl',
	'as' => 'analytics',
	'uses' => 'WebController@analytics'
	));
 
Route::get('/fbLogout', array(
        'as' => 'logout',
        'uses' => 'WebController@logout'
        ));




Route::post('/PayPal_IPN', array('uses' => 'IpnController@paypal', 'as' => 'paypal'));

Route::group(array('prefix' => 'tips'), function(){
    
    Route::get('/', array(
        'as' => 'tips',
        'uses' => 'WebController@tips'
        ));
    
    
    
    Route::get('/success', array(
        'as' => 'tips.success',
        'uses' => 'WebController@paymentSuccess'
        ));
    Route::get('/cancel', array(
        'as' => 'tips.cancel',
        'uses' => 'WebController@paymentCancel'
        ));
    
    Route::group(array('before' => 'auth.user'), function() {
        Route::get('/redeem_free', array(
        'as' => 'redeem_free',
        'uses' => 'WebController@redeem_free'
        ));
    });

});
// API

Route::group(array('prefix' => 'api'), function() {

    

	
        
    Route::group(array('prefix' => 'sms'), function(){
        
        
        Route::get('comfirmTrans', 'SMSController@apiComfirmTrans');
        Route::post('subscribe', 'SMSController@apiSubscribe');
        

    });
    
    Route::group(array('prefix' => 'results'), function(){
        
        
        Route::get('latest', 'ResultController@apiListLatest'); 
        Route::get('listByDate', 'ResultController@apiListResultByDate');       
        Route::get('listDates', 'ResultController@apiListDates'); 
        Route::post('getLuckyNumReport', 'ResultController@apiGetLuckyNumReport'); 
        Route::get('listTbg', 'ResultController@apiListTBG');
        Route::get('getSudoku', 'ResultController@apiGetSudokuResult');
        Route::post('getQztReport', 'ResultController@apiGetQztReport'); 
        Route::get('listFrequence', 'ResultController@apiListFrequence');
        Route::get('listFaiths', 'ResultController@apiListFaiths');

        
        

    });
    
    Route::group(array('prefix' => 'user'), function(){
        
        
        Route::post('getContacts', 'UserController@apiGetContacts');
        Route::post('recordConversion', 'UserController@apiRecordConversion');
//        Route::post('fbConnect', 'UserController@apiFbConnect');
        Route::post('updateToken', 'UserController@apiUpdateToken');
        Route::post('logout', 'UserController@apiLogout');
        Route::post('login', 'UserController@apiLogin');
        Route::post('fbConnect', array(
                'as' => 'FbConnect',
                'uses' => 'UserController@apiFbConnect'
                ));

    });
    
    Route::group(array('prefix' => 'jackportAdmin'), function(){
        
        
        Route::post('create', 'JackportAdminController@apiCreate');
      
    });
    
    Route::group(array('prefix' => 'jackport'), function(){
        
        
        Route::post('getBidNumbers', 'JackportController@apiGetBidNumbers');
        Route::post('getPassResult', 'JackportController@apiGetPassResult');

        

       Route::group(array('before' => 'auth.api'), function() {
          
             Route::post('getCurrent', 'JackportController@apiGetCurrent');
             Route::post('freeNumber', 'JackportController@apiGetFreeNumber');
             Route::post('bid', 'JackportController@apiBidJackport');
             Route::post('getMyBidsNumbers', 'JackportController@apiGetMyBidNumbers');

            
        });
    });
    
    
        //SystemUse
    Route::group(array('prefix' => 'systemuse'), function(){
        
         Route::group(array('before' => 'auth.api'), function() {
             
            Route::get('getResults', 'SystemUseController@apiGetResults');
            Route::get('getResultsByDate', 'SystemUseController@apiGetResultsByDate');
            Route::get('getTuaBehGong', 'SystemUseController@apiGetTuaBehGong');
            Route::get('getLatestResults', 'SystemUseController@apiGetLatestResults');
            Route::get('doAnalytics', 'SystemUseController@apiDoAnalytics');       
           Route::post('pushBulkNotification', 'SystemUseController@apiPushBulkNotification'); 
            Route::post('createDeviceGroup', 'SystemUseController@apiCreateDeviceGroup');  
           Route::post('pushDeviceToGroup', 'SystemUseController@apipushDeviceToGroup'); 


           Route::post('verifyReceipt', 'SystemUseController@apiVerifyReceipt');  
           Route::post('pushNewResultNotification', 'SystemUseController@apiPushNewResultNotification');  
           Route::post('pushAdminNotification', 'SystemUseController@apiPushAdminNotification');  
            Route::get('getFaithArticle', 'SystemUseController@getFaithArticle');

           
         });
             

       
    });
    
    //Payment
    Route::group(array('prefix' => 'payment'), function(){
        
        Route::post('ipay88/sdkBackend', array(
                                'as' => 'payment.ipay88_sdk_backend',
                                'uses' => 'PaymentController@postSdkIPay88Backend'
                                ));
        
        Route::group(array('before' => 'auth.api'), function() {
          
            Route::post('generateToken', 'PaymentController@apiGenerateToken');
            
            
        });
    });
});


