<?php

define('USER_IMAGE_PATH', public_path().'/files/users');
define('USER_IMAGE_URL', URL::to('/files/users'));


define('TGB_PATH', public_path().'/files/tgb');
define('TGB_URL', URL::to('files/tgb'));

define('FB_APP_ID', '189846661513289');
define('FB_APP_SECRET', 'a35e624a9bca62f7d0487163cd3a6224');
define('default_graph_version', 'v2.8');

define('base_url', 'http://ms.spankbang.com');

define('RM_FIVE', 'tips.five.comsumable');
define('RM_TEN', 'tips.ten.comsumable');
define('RM_THIRTY', 'tips.thirty.comsumable');
define('RM_FIFTY', 'tips.fifty.comsumable');
define('RM_HUNDRED', 'tips.hundred.comsumable');


class BaseController extends Controller {

	protected function setupLayout()
	{
		if (!is_null($this->layout)) {
			
			if(Auth::check())
				$identity = Auth::user();
			else 
            	$identity = new stdClass();

			if (!empty($identity->image)) {
				// $identity->image = USER_IMAGE_URL . DIRECTORY_SEPARATOR . $identity->id . DIRECTORY_SEPARATOR . $identity->image;
			}

			$this->layout = View::make($this->layout)
				->with('route', Route::currentRouteName())
				->with('identity', $identity);
		}
	}

	protected function appendScript($src, $section = 'inline')
    {	
    	// TODO: Overide or merge same scripts.
    	// TODO: Sort or order.
    	$this->layout->scripts[$section][] = $src;
    	
    }	

    protected function appendStyle($src, $section = 'inline')
    {	
    	// TODO: Overide or merge same scripts.
    	// TODO: Sort or order.
    	$this->layout->styles[$section][] = $src;
    }

	protected function getRoles()
	{
		return array(
            ROLE_ADMIN => 'Administrator',
			ROLE_MOD => 'Moderator',
			ROLE_AGENT => 'Agent',
			ROLE_MEMBER => 'Member'
		    );
	}

	protected function getPostTypes()
	{
		return array(
			    POST_TYPE_TEXT => 'Text',
			    POST_TYPE_IMAGE => 'Image',
			    POST_TYPE_VIDEO => 'Video'

			);

	}
        
	public function apiGetAppVersion()
	{
            
            
             $appVersion=  AppVersion::first();
             $currentUser=Auth::user();
        
                if(!$appVersion){
                    $jsonResponse->setCode(400);
                    $jsonResponse->setBody('No App version found');
                    return $jsonResponse->get();
                }
                

        
 
            $response=array(
                'IOS_APP_VERSION'=>$appVersion->IOS_APP_VERSION,
                'IOS_BUILD_VERSION'=>(int)$appVersion->IOS_BUILD_VERSION,
                'ANDROID_VERSION'=>$appVersion->ANDROID_VERSION,
                'ANDROID_VERSION_CODE'=>(int)$appVersion->ANDROID_VERSION_CODE,
                'ANDROID_DB_VERSION'=>(int)$appVersion->ANDROID_DB_VERSION,
           
			);
            return $response;
        }

    protected function gcm($token, $msg = 'hello', $id = 0, $type = '')
    {
        if (empty($token)) return;

        $recipient = User::getByDeviceToken($token)->first();

        $pushqueue = new PushQueue;
        $pushqueue->recipient = isset($recipient->id) ? $recipient->id : 0;
        $pushqueue->sender = Auth::user()->id;
        $pushqueue->type = 'gcm';
        $pushqueue->token = $token;
        $pushqueue->message = $msg;
        $pushqueue->time_queued = date('Y-m-d H:i:s');
        $pushqueue->time_sent = NULL;
        $pushqueue->message_type = $type;

        if($type == TYPE_BROADCAST)
            $pushqueue->property_id = $id;
        elseif($type == TYPE_FOLLOW)
            $pushqueue->follower_id = $id;
        elseif(in_array($type, [TYPE_NEGO, TYPE_TRANS]))
            $pushqueue->nego_id = $id;

        $pushqueue->save();

    }   

    protected function apns($token, $msg = 'hello', $id = 0, $type = '')
    {
        // $user = User::find(Auth::user()->id);
        if (empty($token)) return;

        $recipient = User::getByDeviceToken($token)->first();

        $pushqueue = new PushQueue;
        $pushqueue->recipient = isset($recipient->id) ? $recipient->id : 0;
        $pushqueue->sender = Auth::user()->id;
        $pushqueue->type = 'apns';
        $pushqueue->token = $token;
        $pushqueue->message = $msg;
        $pushqueue->time_queued = date('Y-m-d H:i:s');
        $pushqueue->time_sent = NULL;
        $pushqueue->message_type = $type;

        if($type == TYPE_BROADCAST)
            $pushqueue->property_id = $id;
        elseif($type == TYPE_FOLLOW)
            $pushqueue->follower_id = $id;
        elseif(in_array($type, [TYPE_NEGO, TYPE_TRANS]))
            $pushqueue->nego_id = $id;

        $pushqueue->save();

    }    

 public function userToJson($user){
     
    
     
     $user_array=array(
          
                'id' => (int) $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'image' => (empty($user->image) || strpos($user->image, "http://")!== false || strpos($user->image, "https://") !== false) ? $user->image : USER_IMAGE_URL . DIRECTORY_SEPARATOR . $user->id . DIRECTORY_SEPARATOR . $user->image,
                'mobile' => $user->mobile,
                'status'=>$user->status,
                'cover'=>$user->banner
    );

       
        return $user_array;
    }	

    
     public function simpleUserToJson($user){
     
//     $nannyProfile=false;
     
     
     $user_array=array(
          
                'id' => (int) $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'image' => (empty($user->image) || strpos($user->image, "http://")!== false || strpos($user->image, "https://") !== false) ? $user->image : USER_IMAGE_URL . DIRECTORY_SEPARATOR . $user->id . DIRECTORY_SEPARATOR . $user->image,
                'mobile' => empty($user->mobile) ? '' : $user->mobile[0]=='6'?$user->mobile:'6'.$user->mobile,
                
    );

       
        return $user_array;
    }

    
      public function joinedHistoryToJson($result){
        
        return array(
          'product'=>$this->productPhaseToJson($result->productPhase),
          'joined_times'=>(int)$result->joined_times,
          'created_on'=>$result->created_on
         );
    }
  
    public function convertBool($data){
     
        return $data=='true'?true:false;
    }
    
    public function _timeago($ptime)
	{
	    $estimate_time = time() - $ptime;

	    if( $estimate_time < 1 )
	    {
	        return 'less than 1 second ago';
	    }

	    $condition = array( 
	                12 * 30 * 24 * 60 * 60  =>  'year',
	                30 * 24 * 60 * 60       =>  'month',
	                24 * 60 * 60            =>  'day',
	                60 * 60                 =>  'hour',
	                60                      =>  'minute',
	                1                       =>  'second'
	    );

	    foreach( $condition as $secs => $str )
	    {
	        $d = $estimate_time / $secs;

	        if( $d >= 1 )
	        {
	            $r = round( $d );
	            return $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
	        }
	    }
	}
        
        public function getDateFromDateTime($dateTime){
            $date = strtotime($dateTime);
            return date('d F Y', $date);
        }
        
        public function getdateTimeWithSa($dateTime){
            $date = strtotime($dateTime);
            return date('d.m.Y h:i a', $date);
        }
        
        public function getdateTimeWithSla($dateTime){
            $date = strtotime($dateTime);
            return date('d.m.Y | h:i a', $date);
        }
        
        
            
         public function checkPhoneValidation($mobile){
            
             
                $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
                try {
                    $phoneNumberObject = $phoneUtil->parse($mobile, "MY");
                    
                    if(!$phoneUtil->isValidNumber($phoneNumberObject)){
                        return array('status'=>0,'msg'=>'Invalid phone number');
}
                    
                     $countryCode=$phoneNumberObject->getCountryCode();
                    $nationalNumber=$phoneNumberObject->getNationalNumber();
                    
                      return array('status'=>1,
                                    'phoneObject'=>array(
                                    'countryCode'=>$countryCode,
                                    'nationalNumber'=> $nationalNumber
                                        )
                                    );
                 
                } catch (\libphonenumber\NumberParseException $e) {
                    return array('status'=>0,'msg'=>$e->getMessage());
                }
         }
         
         function millisecsBetween($dateOne, $dateTwo, $abs = true) {
       
                if($dateOne>$dateTwo)
                    return 0;

                 $func = $abs ? 'abs' : 'intval';

             return $func(strtotime($dateOne) - strtotime($dateTwo)) * 1000;
         }
         
         public function bannerToJson($banner){
             
             
             return array('id'=>(int)$banner->id,
                          'url'=>$banner->url,
                          'image'=>BANNER_IMAGE_URL . DIRECTORY_SEPARATOR . $banner->id . DIRECTORY_SEPARATOR . $banner->image
                         );
         }
         

         
        function genUniKey($prefix=''){

               $codeLength=4;
               $key= $this->generateRandomString($codeLength);


             return $prefix.$key;

           }
           
   function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        
       public function pushNotification($body,$data,$type,$action,$token,$sender)
            {
           
           $body_loc_key="";
               switch ($type){
                   case 'new_result':
                       $body_loc_key="notification_new_result";
                     break;
                 case 'new_sudoku':
                        $body_loc_key="notification_new_sudoku";
                     break;                 
                 case 'jackport_result':
                        $body_loc_key="notification_jackport_result";
                     break;
                 
                 case 'jackport_new':
                        $body_loc_key="notification_jackport_new";
                     break;
                       
               }
           
                $topic_key=Config::get('4dhuat.notification_key_name');
                $notification=$data;
                $notification['body_loc_key']='notification_view_more';
                $notification['click_action']=$action;
                
                $message=array(
//                'to'=>"/topics/$topic_key",
                'to'=>"$token",
                "message_id"=> uniqid($topic_key, false)."-".time(),   
//                'to'=>$token,
                'content_available'=>false,
                'priority'=>'high',
                'type'=>$type, 
                'data'=>$data,
                'notification'=>$notification 
                
                );
                
                if(!empty($body_loc_key)){
                    $message["notification"]["title_loc_key"]= $body_loc_key;
                }
                
                if(!empty($sender)){
                    $message["notification"]["title"]= $sender;
                    $message["notification"]["title_loc_key"]='';
                }
                
               $receiptObject= json_encode($message,JSON_UNESCAPED_SLASHES);
                
                $endpoint="https://fcm.googleapis.com/fcm/send";
                 $serverKey=Config::get('4dhuat.SERVER_KEY');
                 $senderID=Config::get('4dhuat.SENDER_ID');

               $options = [
                   'http' => [
                       'header'  => "Content-Type:application/json\r\n" .
                                    "Authorization:key=$serverKey\r\n",
                       'method'  => 'POST',
                       'ignore_errors' => TRUE,
                       'content' => $receiptObject
                   ],
               ];
               $context = stream_context_create($options);
               $result = file_get_contents($endpoint, FALSE, $context);
               if ($result === FALSE)
               {
                   throw new ServerErrorException('Error validating transaction.', 560);
               }
               // Decode json object (TRUE variable decodes as an associative array)
//               return $message;
               return json_decode($result, TRUE);
            }  
            
            
        public function createDeviceGroup($phase_id,$registration_ids)
            {
                
                $message=array(
                'operation'=>'create',
                'notification_key_name'=>'phaseID_'.$phase_id,
                'registration_ids'=>$registration_ids,
                
                );
                
               $receiptObject= json_encode($message);
//                $receiptObject='{"operation":"create","notification_key_name":"phase_21","registration_ids":["cKl9Vws5H3k:APA91bGH15azCpwo8hAAAwP_Ni7fbJipSRjCAcEZhJf9oqTOm3zL1BAKgaYu64QkNnyeMeAec9TgmFhLgSAafb9IVkELeja4pGyFTLJQxPftfCleUJCI_Yd3SjgmkdEKbxgex4RhcMqq"]}';
            
                $endpoint="https://android.googleapis.com/gcm/notification";
                 $serverKey=Config::get('4dhuat.SERVER_KEY');
                 $senderID=Config::get('4dhuat.SENDER_ID');

               $options = [
                   'http' => [
                       'header'  => "Content-Type:application/json\r\n" .
                                    "Authorization:key=$serverKey\r\n".
                                    "project_id:$senderID\r\n",
                       'method'  => 'POST',
                        'ignore_errors' => TRUE,
                       'content' => $receiptObject
                   ],
               ];
               $context = stream_context_create($options);
               $result = file_get_contents($endpoint, FALSE, $context);
               if ($result === FALSE)
               {
//                   echo json_encode($result);
                   throw new ServerErrorException('Error validating transaction.', 560);
               }
               // Decode json object (TRUE variable decodes as an associative array)
               return json_decode($result, TRUE);
            } 
            
            public function AddDeviceToGroup($phase_id,$registration_ids,$notification_key)
            {
                
                $message=array(
                'operation'=>'add',
                'notification_key'=> $notification_key,
                'notification_key_name'=>'phaseID_'.$phase_id,
                'registration_ids'=>$registration_ids,
                
                );
                
               $receiptObject= json_encode($message);
//                $receiptObject='{"operation":"create","notification_key_name":"phase_21","registration_ids":["cKl9Vws5H3k:APA91bGH15azCpwo8hAAAwP_Ni7fbJipSRjCAcEZhJf9oqTOm3zL1BAKgaYu64QkNnyeMeAec9TgmFhLgSAafb9IVkELeja4pGyFTLJQxPftfCleUJCI_Yd3SjgmkdEKbxgex4RhcMqq"]}';
            
                $endpoint="https://android.googleapis.com/gcm/notification";
                 $serverKey=Config::get('4dhuat.SERVER_KEY');
                 $senderID=Config::get('4dhuat.SENDER_ID');

               $options = [
                   'http' => [
                       'header'  => "Content-Type:application/json\r\n" .
                                    "Authorization:key=$serverKey\r\n".
                                    "project_id:$senderID\r\n",
                       'method'  => 'POST',
                        'ignore_errors' => TRUE,
                       'content' => $receiptObject
                   ],
               ];
               $context = stream_context_create($options);
               $result = file_get_contents($endpoint, FALSE, $context);
               if ($result === FALSE)
               {
//                   echo json_encode($result);
                   throw new ServerErrorException('Error validating transaction.', 560);
               }
               // Decode json object (TRUE variable decodes as an associative array)
               return json_decode($result, TRUE);
            }  

            public function AddDeviceToGlobalGroup($registration_ids)
            {
                
                $notification_key=Config::get('4dhuat.notification_key');
                $notification_key_name=Config::get('4dhuat.notification_key_name');
                
                $message=array(
                'operation'=>'add',
                'notification_key'=> $notification_key,
                'notification_key_name'=>$notification_key_name,
                'registration_ids'=>$registration_ids,
                
                );
                
               $receiptObject= json_encode($message);
           
//                $receiptObject='{"operation":"create","notification_key_name":"phase_21","registration_ids":["cKl9Vws5H3k:APA91bGH15azCpwo8hAAAwP_Ni7fbJipSRjCAcEZhJf9oqTOm3zL1BAKgaYu64QkNnyeMeAec9TgmFhLgSAafb9IVkELeja4pGyFTLJQxPftfCleUJCI_Yd3SjgmkdEKbxgex4RhcMqq"]}';
            
                $endpoint="https://android.googleapis.com/gcm/notification";
                $serverKey=Config::get('4dhuat.SERVER_KEY');
             $senderID=Config::get('4dhuat.SENDER_ID');

               $options = [
                   'http' => [
                       'header'  => "Content-Type:application/json\r\n" .
                                    "Authorization:key=$serverKey\r\n".
                                    "project_id:$senderID\r\n",
                       'method'  => 'POST',
                        'ignore_errors' => TRUE,
                       'content' => $receiptObject
                   ],
               ];
               $context = stream_context_create($options);
               $result = file_get_contents($endpoint, FALSE, $context);
               if ($result === FALSE)
               {
//                   echo json_encode($result);
                   throw new ServerErrorException('Error validating transaction.', 560);
               }
               // Decode json object (TRUE variable decodes as an associative array)
               return json_decode($result, TRUE);
            } 
 
           public function RemoveDeviceFromGlobalGroup($registration_ids)
            {
                
                $notification_key=Config::get('bidoboo.notification_key');
                $notification_key_name=Config::get('bidoboo.notification_key_name');
                
                $message=array(
                'operation'=>'remove',
                'notification_key'=> $notification_key,
                'notification_key_name'=>$notification_key_name,
                'registration_ids'=>$registration_ids,
                
                );
                
               $receiptObject= json_encode($message);
//                $receiptObject='{"operation":"create","notification_key_name":"phase_21","registration_ids":["cKl9Vws5H3k:APA91bGH15azCpwo8hAAAwP_Ni7fbJipSRjCAcEZhJf9oqTOm3zL1BAKgaYu64QkNnyeMeAec9TgmFhLgSAafb9IVkELeja4pGyFTLJQxPftfCleUJCI_Yd3SjgmkdEKbxgex4RhcMqq"]}';
            
                $endpoint="https://android.googleapis.com/gcm/notification";
                 $serverKey=Config::get('4dhuat.SERVER_KEY');
             $senderID=Config::get('4dhuat.SENDER_ID');

               $options = [
                   'http' => [
                       'header'  => "Content-Type:application/json\r\n" .
                                    "Authorization:key=$serverKey\r\n".
                                    "project_id:$senderID\r\n",
                       'method'  => 'POST',
                        'ignore_errors' => TRUE,
                       'content' => $receiptObject
                   ],
               ];
               $context = stream_context_create($options);
               $result = file_get_contents($endpoint, FALSE, $context);
               if ($result === FALSE)
               {
//                   echo json_encode($result);
                   throw new ServerErrorException('Error validating transaction.', 560);
               }
               // Decode json object (TRUE variable decodes as an associative array)
               return json_decode($result, TRUE);
            } 
            
      function generatePhoneCode($length = 4) {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        
        public function formPhoneCode($code,$userID){

         

            return $userID.'-'.$code;
        }
        
        public function rrmdir($dir) { 
            
            if (is_dir($dir)) { 
              $objects = scandir($dir); 
              foreach ($objects as $object) { 
                if ($object != "." && $object != "..") { 
                  if (is_dir($dir."/".$object))
                    rrmdir($dir."/".$object);
                  else
                    unlink($dir."/".$object); 
                } 
              }
              rmdir($dir); 
            } 
          }
          
          public function LinksToJson($shareLink){
              
              return array(
                'id'=>(int) $shareLink->id,
                'title'=>$shareLink->title,
                'description'=>$shareLink->description,
                'image'=>$shareLink->image,
                'site_name'=>$shareLink->site_name,
                'url'=>$shareLink->url,
                'created_on'=>$this->_timeago(strtotime($shareLink->created_on))
              );
          }
          
          
        public function jackportPhaseToJson($jackportPhase){
            
            $jackport=$jackportPhase->jackport;
            
            return array(
              'id'=>(int)$jackportPhase->id,
              'jackport'=>array(
                'id'=>(int)$jackport->id,
                'title'=>$jackport->title,
                'reward'=>number_format($jackport->reward,2),
                'description'=>"号码 [".$this->convertNumber($jackportPhase->current_join+1)."] - [".$jackport->require_join."]，直到派完为止",
                'result_method'=>$jackport->result_method,
                'require_join'=>(int)$jackport->require_join,
                'allow_free'=>(int)$jackport->allow_free,
              ),
              'release_date'=>$jackport->release_date,
              'round'=>$jackportPhase->round,
              'current_join'=>$jackportPhase->current_join,
              'current_redeem'=>(int)$jackportPhase->current_redeem,
              'status'=>$jackportPhase->status,
              'winner'=>($jackportPhase->winner == null)?
                            array(
                                    'id'=>0,
                                    'name'=>'-',
                                    'won_number'=>($jackportPhase->won_number == null)?'-':$this->convertNumber($jackportPhase->won_number),
                                    'release_date'=>($jackportPhase->release_date == null)?'-':$this->getdateTimeWithSa($jackportPhase->release_date),
                                    'image'=>'',
                                    'total_bid'=>'-'   
                              )
                            :array(
                                    'id'=>(int)$jackportPhase->winner->id,
                                    'name'=>$jackportPhase->winner->name,
                                    'won_number'=>$this->convertNumber($jackportPhase->won_number),
                                    'release_date'=>$this->getdateTimeWithSa($jackportPhase->release_date),
                                    'image' => $jackportPhase->winner->image
                                    )  
            );
        }  
        
    public function openNextRound($jackport){
        
        $next_phase=JackportPhase::getNextRound($jackport->id)->first();
        if($next_phase){
            
            $jackport->current_phase_id=$next_phase->id;
            $jackport->save();
        }else{
            $jackport->status='waiting';
            $jackport->save();
        }
    }
          
        public function convertNumber($number){
            return sprintf("%04s", $number);
        }

    function getAndroidBilling($skuID,$ref){
          
//          notasecret
        try {
         // create new Google Client
                 $client = new Google_Client();
                 // set Application Name to the name of the mobile app
                 $client->setApplicationName("fourdhuat");
                 // get p12 key file
                 $key = file_get_contents(app_path().'/../fourdhuat-44214919a13a.p12');
                 // create assertion credentials class and pass in:
                 // - service account email address
                 // - query scope as an array (which APIs the call will access)
                 // - the contents of the key file
                 $cred = new Google_Auth_AssertionCredentials(
                     '676646200770-compute@developer.gserviceaccount.com',
                     ['https://www.googleapis.com/auth/androidpublisher'],
                     $key
                 );
                 // add the credentials to the client
                 $client->setAssertionCredentials($cred);

                 // create a new Android Publisher service class
                 $service = new Google_Service_AndroidPublisher($client);

                 // set the package name and subscription id
                 $packageName = "com.solution.flyhigh.fourdhuat";
     //            $subscriptionId = "wonderlist.property.30days1slot";
                 $subscriptionId =$skuID;

                 $purchaseToken=$ref;
     //            $purchaseToken="fphcdbgcbpghelchfliinfcg.AO-J1Ozg9yQALcQa9v-20I__OklrUbHv3J3Jd33r4jIPFlrbdEGHDJdEcPaRoUfImp2C4rnJEWSRLHTJ_i9MlZ9YR0pvxAWM8YFBZc7EYp6Tj7nzu6DF4wZb2DMFHOqoQst5dUP5EyboW1qhFGPowa3oNuLgnwBHEw";
                 // use the purchase token to make a call to Google to get the subscription info
                 $subscription = $service->purchases_products->get($packageName, $subscriptionId, $purchaseToken);
                 
                 
               if (is_null($subscription)) {
                         // query returned no data
//                         throw new ServerErrorException('Error validating transaction.', 500);
                    return null;

                     } elseif (isset($subscription['error']['code'])) {
                         // query returned an error
//                         throw new ServerErrorException('Error validating transaction.', 500);
//                        echo var_dump($subscription);
                         Log::error('getAndroidBilling: ' . json_encode($subscription));
                        return null;

                     }
                     
                 return $subscription;


             } catch (Google_Auth_Exception $e) {
                 // if the call to Google fails, throw an exception
                 throw new Exception('Error validating transaction', 500);
             }

         }
         
    public function pushAdminNotification($SKU,$user){
        
        $revenue="RM4.99";
         switch ($SKU){
            case RM_FIVE:
                $revenue="RM4.99";
            break;
            case RM_TEN:
                $revenue="RM9.99";
            break;
            case RM_THIRTY:
                $revenue="RM29.99";
             break;
            case RM_FIFTY:
                $revenue="RM49.99";
             break;
            case RM_HUNDRED:
                $revenue="RM99.99";
            break;
        }
        
            $name=$user->name;
         
           $token=Config::get('4dhuat.notification_key');
           $msg_type='thanks_donate';
           $action='activity_subscription';
           $msg="感谢 $name 打赏了 $revenue";
           $data=array(
                    'id'=>0,
                    'msg_type'=>$msg_type,
                    'msg'=>$msg,
                    'title'=>'Click to view',
                    'body'=> $msg

            );
        return $this->pushNotification($msg,$data,$msg_type,$action,$token,$msg); 
      
        
//        $user=User::where('role','admin')->first();
//        if(!empty($user->android)){
//             $token=$user->android;
//                                    $msg_type='new_result';
//                                    $action='activity_main';
//                                    $msg='['.$revenue.'] New user purchase product !!';
//                                    $data=array(
//                                             'id'=>0,
//                                             'msg_type'=>$msg_type,
//                                             'msg'=>$msg,
//                                             'title'=>'Click to view',
//                                             'body'=> $msg
//
//                                     );
//        return $this->pushNotification($msg,$data,$msg_type,$action,$token,$msg); 
//        }
       return array();
    }
    
    public function specialToJson($special){
      
      return $special->value;
  }
    
    public function resultToJson($result){
        
        $specials=$result->specials;
        $special_array=array();
        foreach($specials as $special){
            $special_array[]=$this->specialToJson($special);
        }
        
        $consolations=$result->consolations;
        $consolation_array=array();
        foreach($consolations as $consolation){
            $consolation_array[]=$this->specialToJson($consolation);
        }
        
        return array(
          'id'=>(int)$result->id,
          'date'=>$result->date,
          'title'=>$result->title,
          'phase'=> $result->phase,
          'r1'=>$result->r1,
          'r2'=>$result->r2,
          'r3'=>$result->r3,
          'prize_1'=>$result->prize_amount1,
          'prize_2'=>$result->prize_amount2,
          'specials'=>$special_array,
          'consolations'=>$consolation_array,
         
        );
    }
    
     public function emptyResultToJson(){
        
        
        
        return array(
          'id'=>0,
          'date'=>'-',
          'title'=>'-',
          'phase'=> '-',
          'r1'=>'-',
          'r2'=>'-',
          'r3'=>'-',
          'prize_1'=>'-',
          'prize_2'=>'-',
          'specials'=>array(),
          'consolations'=>array(),
         
        );
    }
    
    public function dateToJson($date){
        
        return array(
          'id'=>(int)$date->id,
          'date'=>$date->date,
          'day'=>$date->day
        );
        
    }
    
    public function TBGToJson($tbg){
        
        return array(
          'id'=>(int)$tbg->id,
          'number'=>$tbg->number,
          'name'=>$tbg->name,
          'type'=>$tbg->type,
          'name_cn'=>$tbg->name_cn,
          'image'=>TGB_URL . DIRECTORY_SEPARATOR . $tbg->id . DIRECTORY_SEPARATOR .$tbg->image
        );
        
    }
    
        public function JackportBidToJson($jackportBid){
        
        return array('number'=>$this->convertNumber($jackportBid->id));
    }
    
    public function jackportBidWithUserToJson($jackportBid){
        
        return array(
          'name'=>$jackportBid->name,
          'image'=>$jackportBid->image,
          'number'=>$this->convertNumber($jackportBid->id),
          'created_on'=>$this->getdateTimeWithSa($jackportBid->created_on));
    }
    
    public function verifyPTD($is_sanbox,$tx_token){
        
        if($is_sanbox){
            $pp_hostname = "www.sandbox.paypal.com";
            $auth_token = "0UbcZA3nPQHwegj2cWjyYQ2jL7k0jnh-8VlI-ytdndQbGNHGvRgT5u0fBmu";
        }else{
            $pp_hostname = "www.paypal.com";
            $auth_token = "_Lf_kzEedJNp-qH3lWOS8N2-hfRewnYMyFfOTToHbcBvjlHwgpT9E_i4CgS";
        }
        //         // Change to www.sandbox.paypal.com to test against sandbox
             // Change to www.sandbox.paypal.com to test against sandbox
            
        // read the post from PayPal system and add 'cmd'
            $req = 'cmd=_notify-synch';

           
            
            $req .= "&tx=$tx_token&at=$auth_token";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
            //set cacert.pem verisign certificate path in curl using 'CURLOPT_CAINFO' field here,
            //if your server does not bundled with default verisign certificates.
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
            $res = curl_exec($ch);
            curl_close($ch);
            if(!$res){
                //HTTP ERROR
            }else{
                 // parse the data
                $lines = explode("\n", trim($res));
                $keyarray = array();
                if (strcmp ($lines[0], "SUCCESS") == 0) {
                    for ($i = 1; $i < count($lines); $i++) {
                        $temp = explode("=", $lines[$i],2);
                        $keyarray[urldecode($temp[0])] = urldecode($temp[1]);
                    }
                // check the payment_status is Completed
                // check that txn_id has not been previously processed
                // check that receiver_email is your Primary PayPal email
                // check that payment_amount/payment_currency are correct
                // process payment
                $firstname = $keyarray['first_name'];
                $lastname = $keyarray['last_name'];
                $itemname = $keyarray['item_name'];
                $amount = $keyarray['payment_gross'];

//                echo ("<p><h3>Thank you for your purchase!</h3></p>");
//
//                echo ("<b>Payment Details</b><br>\n");
//                echo ("<li>Name: $firstname $lastname</li>\n");
//                echo ("<li>Item: $itemname</li>\n");
//                echo ("<li>Amount: $amount</li>\n");
//                echo ("");
//                exit;
                return $itemname;
                }
                else if (strcmp ($lines[0], "FAIL") == 0) {
                    // log for manual investigation
                }
            }
            
            return '';
    }
}
