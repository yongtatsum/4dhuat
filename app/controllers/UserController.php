<?php

 
use Swagger\Annotations as SWG;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;

/**
 * @SWG\Resource(
 * 	apiVersion="1.0",
 *	resourcePath="/user",
 *	description="user operations",
 *	produces="['application/json']"
 * )
 */
class UserController extends BaseController{

        /**
     *
     * @SWG\Api(
     *   path="/user/fbConnect",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="Connect by facebook",
     *       notes="Returns a json",
     *       nickname="fbConnect",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="access_token",
     *           description="user's facebook access_token",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *           defaultValue="EAACsqh7SQEkBAHhMCOpeBrAEOahxmD57eN9QFEOZBaOZCmKlXksAyEoKb7QH5EHMq9ADLRrBRCHjiyI0ZCFdvstHhRQX4xRVFhn4vJXrF8HPiQ3Am1rgYZAylOYynZB1gdof82VNdix0cZBgZAn7se2MaNcmyIa0cMhSK3qh8ZA2o98GuaZAjXRY05bPxq2cDiFIZD"
     *          ),
     *         @SWG\Parameter(
     *           name="app_token",
     *           description="user's app token",
     *           paramType="form",
     *           required=true,
     *           type="string"
     *          ),
     *       )
     *       )
     *     )
     *   )
     * )
     */    
   public function apiFbConnect(){
       
        $jsonResponse = new JsonResponse();;
        $access_token=Input::get('access_token','');
        $app_token=Input::get('app_token','');



        if(!empty($access_token)){
         
             $fb = new Facebook\Facebook([
            'app_id' => FB_APP_ID,
            'app_secret' => FB_APP_SECRET,
            'default_graph_version' => default_graph_version,
            ]);

            try {
              $fb_response = $fb->get('/me?fields=id,name,email,cover,picture.width(320).height(320)', $access_token);
            } catch(Facebook\Exceptions\FacebookResponseException $e) {

                      $jsonResponse->setCode(400);
                      $jsonResponse->setBody('Graph returned an error: ' . $e->getMessage());
                      return $jsonResponse->get();

            } catch(Facebook\Exceptions\FacebookSDKException $e) {

                      $jsonResponse->setCode(400);
                      $jsonResponse->setBody('Facebook SDK returned an error: ' . $e->getMessage());
                      return $jsonResponse->get();
            }

            $fb_user = $fb_response->getGraphUser();

            
            $fbID=$fb_user['id'];
            $password = '';
            $name=$fb_user['name'];
            $mobile='';
            
            try {
                $email=$fb_user['email'];
            } catch (Exception $exc) {
                $email='';
            }
            
            try {
                $avatar=$fb_user['picture']['url'];
            } catch (Exception $exc) {
                $avatar='';
            }
            
             try {
                $cover=$fb_user['cover']['source'];
            } catch (Exception $exc) {
                $cover='';
            }

            
           
        }
        


        $user=User::where('facebook_id',$fbID)->first();
        
        if(!$user){
            
                    $user = new User;
                    $password = Hash::make('fbpassword'.$fbID);

                    $user->name = $name;
                    $user->email = $email;
                    $user->mobile = $mobile;
                    $user->password = $password;
                    $user->image=$avatar;
                    $user->banner=$cover;                    


        }
            
             $user->android=$app_token;
             $user->facebook_id = $fbID;
             $user->fb_accessToken=$access_token;
             $user->status = 'active';
             $user->save();
        
        
              
        $attempt = Auth::loginUsingId($user->id);

          if (!$attempt) {
                    $jsonResponse->setCode(400);
                    $jsonResponse->setBody('Email and facebook account does not match');
                    return $jsonResponse->get();
                             
          }
          
          Session::put('access_token', $access_token);
          $response = array('user'=>$this->userToJson($user));
          $jsonResponse->setResponse($response);
          return $jsonResponse->get();
            
    }
    
    
    /**
     *
     * @SWG\Api(
     *   path="/user/getContacts",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="getContacts",
     *       notes="Returns a json",
     *       nickname="getContacts",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="mobiles[0]",
     *           description="mobile",
     *           paramType="query",
     *           required=true,
     *           type="string",
     *          )
     *         )
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiGetContacts()
    {
        $jsonResponse = new JsonResponse();
        $response = '';
        
        

        $mobiles = Input::get('mobiles',array());
        
        for($i=0;$i<sizeof($mobiles);$i++){
            
            $contact=Contact::where('mobile',$mobiles[$i])->first();
            if(!$contact){
                 $contact=new Contact();
                $contact->mobile=$mobiles[$i];
                $contact->save();
            }
           
            
        }
       
        
        
        $response=array();
        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        

    }

    
    /**
     *
     * @SWG\Api(
     *   path="/user/recordConversion",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="recordConversion",
     *       notes="Returns a json",
     *       nickname="recordConversion",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="media_source",
     *           description="media_source",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *          ),
     *         @SWG\Parameter(
     *           name="af_status",
     *           description="af_status",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *          ),
     *         @SWG\Parameter(
     *           name="af_message",
     *           description="af_message",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *          ),
     *         @SWG\Parameter(
     *           name="clickid",
     *           description="clickid",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *          ),
     *         @SWG\Parameter(
     *           name="agency",
     *           description="agency",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *          )
     *         )
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiRecordConversion()
    {
        $jsonResponse = new JsonResponse();
 
        

        $media_source = Input::get('media_source');
        $af_status = Input::get('af_status');
        $af_message = Input::get('af_message');
        $clickid = Input::get('clickid');
        $agency = Input::get('agency');
        
        $recordConversion=  new RecordConversion();
        $recordConversion->af_status=$af_status;
        $recordConversion->af_message=$af_message;
        $recordConversion->clickid=$clickid;
        $recordConversion->agency=$agency;
        $recordConversion->media_source=$media_source;
        $recordConversion->save();
 
        $jsonResponse->setResponse(array());

    	return $jsonResponse->get();
        

    }
    
      /**
     *
     * @SWG\Api(
     *   path="/user/logout",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="User logout",
     *       notes="Returns a json",
     *       nickname="logout",
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiLogout()
    {

        $jsonResponse = new JsonResponse();

        Auth::logout();

        return $jsonResponse
        ->get()
        ;

    }
    
    /**
     *
     * @SWG\Api(
     *   path="/user/login",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="User login",
     *       notes="Returns a json",
     *       nickname="login",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="email",
     *           description="user's email",
     *           paramType="form",
     *           required=true,
     *           type="string"
     *          ),
     *         @SWG\Parameter(
     *           name="password",
     *           description="user's password",
     *           paramType="form",
     *           required=true,
     *           type="string"
     *          )

     *       ),
     *          @SWG\ResponseMessage(
     *            code=401,
     *            message="Email and password does not match"
     *          ),
     *          @SWG\ResponseMessage(
     *            code=404,
     *            message="Email address not found"
     *          )
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiLogin()
    {
        $jsonResponse = new JsonResponse();
        $response = '';
        

        $rules = array(
            'email' => 'required',
            'password' => 'required'
            );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()) {
            $jsonResponse->setCode(400);
            $jsonResponse->setBody($validator->messages()->first());
            return $jsonResponse->get();

        }
        
        $attempt = Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')));

                if ($attempt) {
                    
                    $response =$this->userToJson(Auth::user());
                }else{
                    $jsonResponse->setCode(401);
                    $jsonResponse->setSubject('Error');
                    $jsonResponse->setBody('Email and password does not match');
                     return $jsonResponse->get();
                }
        
        $jsonResponse->setResponse($response);
        
        return $jsonResponse->get();

    }
   
    
       /**
     *
     * @SWG\Api(
     *   path="/user/updateToken",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="User update token",
     *       notes="Returns a json",
     *       nickname="updateToken",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="token",
     *           description="user's app token",
     *           paramType="form",
     *           required=true,
     *           type="string"
     *          ),
     *         @SWG\Parameter(
     *           name="platform",
     *           description="device's platform",
     *           paramType="form",
     *           required=true,
     *           enum={"android", "ios"},
     *           type="string",
     *          
     *          )
     *       )
     *       )
     *     )
     *   )
     * )
     */ 

    public function apiUpdateToken(){
        
        $jsonResponse = new JsonResponse();

        $response = array();
       
            $user =Auth::user();
            

            $token = trim(Input::get('token'));
            $platform = Input::get('platform','android');
//            $old_users = User::getByDeviceToken($token)->get();

            if ($platform == 'ios') {

//                foreach ($old_users as $old_user) {
//                    if($old_user->id != $user->id) {
//                        $old_user->ios = '';
//                        $old_user->save();
//                    }
//                }

                $user->ios = $token;  
                // $user->android = NULL;  

            } else {


               
               
                $register_ids=array();
                $register_ids[]=$token;
                $topic_key=Config::get('4dhuat.notification_key_name');
//                $response= $this->batchAddAppInstances($topic_key,$register_ids);
//                $this->AddDeviceToGlobalGroup($register_ids);

            }
            
            if($user!=null){
                 $user->android = $token;
                 $user->save();
            }
            
         $userToken= new UserToken();
         $userToken->token=$token;
         $userToken->save();
            

        $jsonResponse->setResponse($response);

        return $jsonResponse->get();
    }
    
    public function subscriberToJson($subscribe){
     
        return array(
          'id'=>(int)$subscribe->id,
          'mobile'=> $subscribe->mobile,
          'trans_id'=>$subscribe->trans_id
        );
    }
    
}