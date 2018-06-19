<?php

 
 use Swagger\Annotations as SWG;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;

/**
 * @SWG\Resource(
 * 	apiVersion="1.0",
 *	resourcePath="/systemUse",
 *	description="systemUse operations",
 *	produces="['application/json']"
 * )
 */
 
class SystemUseController extends BaseController{

//    protected $layout = 'layout.admin';
//SET GLOBAL foreign_key_checks = 0;
//TRUNCATE TABLE result_consolation;
//TRUNCATE TABLE result;
//TRUNCATE TABLE result_date;
//
//SET GLOBAL  foreign_key_checks = 1;
    

        /**
     *
     * @SWG\Api(
     *   path="/systemuse/getResults",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="getResults",
     *       notes="Returns a json",
     *       nickname="getResults",
     *     )
     *   )
     * )
     */
    public function apiGetResults()
    {
        $jsonResponse = new JsonResponse();
        
             
        $begin = new DateTime( "2016-10-22" );
        $end   = new DateTime( "2017-02-28" );

        $dates_array=array();
        for($i = $begin; $begin <= $end; $i->modify('+1 day')){
            
             $date=$i->format("Y-m-d");
             
             $weekday=date("N", strtotime($date));
         
          
          if($weekday == 2 || $weekday == 3 || $weekday == 6 || $weekday == 7){
              $day=date("D", strtotime($date));
             $dates_array[]="$date($day)";
              
             $this->getResults($date,"all");
            
          }
     
        }
            
       

        $response=array(
                'dates'=>$dates_array
         );
//        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
    }
    
        /**
     *
     * @SWG\Api(
     *   path="/systemuse/getTuaBehGong",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="getTuaBehGong",
     *       notes="Returns a json",
     *       nickname="getTuaBehGong",
     *     )
     *   )
     * )
     */
    public function apiGetTuaBehGong()
    {
        $jsonResponse = new JsonResponse();
        
        $result_array=array();
        for($i=41;$i<=200;$i++){
            $result_array[]=$this->getTBGResults($i);
        }
             
       
       

        $response=array(
                'result'=>$result_array
         );
//        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
    }
    
    /**
     *
     * @SWG\Api(
     *   path="/systemuse/getFaithArticle",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="getFaithArticle",
     *       notes="Returns a json",
     *       nickname="getFaithArticle",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="page",
     *           description="page",
     *           paramType="query",
     *           required=false,
     *           type="string"
     *          )
     * 
     *         )
     *     )
     *   )
     * )
     */
    public function getFaithArticle()
    {
        $jsonResponse = new JsonResponse();
        
        $page = Input::get('page','1');

                
        $result_array= $this->getFaithResults($page);

        $response=array(
                'result'=>$result_array
         );
//        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
    }
    
    public function getFaithResults($page){
      
       $host="http://3g.d1xz.net";
        
       $homepage=$host."/sx/zonghe/index_$page.aspx"; 
       
       $html = new \Htmldom($homepage);
       
       $title_array=array();
       
       foreach($html->find('.public_title_list a') as $title){
                    
               

              $faithArticle=  FaithArticle::where('link',$host.$title->href)->first();
              if(!$faithArticle){
                 $content=  $this->getFaithContent($host.$title->href);
                 $faithArticle=new FaithArticle();
                 $faithArticle->title=$title->plaintext;
                 $faithArticle->link=$host.$title->href;
                 $faithArticle->content=$content;
                 $faithArticle->save();
              }
              
              $title_array[]=array(
                    'link'=>$host.$title->href,
                    'title'=>$title->plaintext,
                    'content'=>$content
                );

        }
      
        
       
       
      return $title_array;
       
    }
    
    public function getFaithContent($homepage){
      
      
       $content='';
       $html = new \Htmldom($homepage);
       
       $title_array=array();
       
      $content=$html->find('.public_ad_content', 0)->innertext;
      
        
       
       
      return $content;
       
    }
    
    
    public function getResults($search_date,$type='all'){
      
       
        
       $homepage="http://app.4d88.com/history/date?d=$search_date&mode=mobile"; 
       $html = new \Htmldom($homepage);
       
       switch($type){
           case 'magnum-toto-damacai':
                $container=$html->find('#magnum-toto-damacai', 0);
                 $results= $this->findResultsFromContainer($search_date,$type,$container);
               break;
           case 'sabah-sarawak-stc':
                $container=$html->find('#sabah-sarawak-stc', 0);
                 $results= $this->findResultsFromContainer($search_date,$type,$container);
               break;
           case 'singapore-pool':
               $container=$html->find('#singapore-pool', 0);
               $results= $this->findResultsFromContainer($search_date,$type,$container);
               break;
           case 'all':
               $container=$html->find('#magnum-toto-damacai', 0);
               $results= $this->findResultsFromContainer($search_date,'magnum-toto-damacai',$container);
                
               $container=$html->find('#sabah-sarawak-stc', 0);
               $results= $this->findResultsFromContainer($search_date,'sabah-sarawak-stc',$container);
                 
               $container=$html->find('#singapore-pool', 0);
               $results= $this->findResultsFromContainer($search_date,'singapore-pool',$container);
       }
       
       
      return $results;
       
    }
    
     public function getLatestResults($search_date,$type='all'){
      
       
        
     $result_array=array();
      
       switch($type){
           case 'magnum-toto-damacai':
                $homepage="http://m.4d88.com/"; 
                $html = new \Htmldom($homepage);
//                echo $html;
//                exit;
                $result_array[]= $this->findLatestResultsFromContainer($search_date,$type,$html);
               break;
           case 'sabah-sarawak-stc':
               
                $homepage="http://m.4d88.com/loto88-stc-cashsweep.html"; 
                $html = new \Htmldom($homepage);
                $result_array[]= $this->findLatestResultsFromContainer($search_date,$type,$html);
               break;
           case 'singapore-pool':
                $homepage="http://4d88.com/singapore-pools.html"; 
                $html = new \Htmldom($homepage);
                $result_array[]= $this->findLatestResultsFromContainer($search_date,$type,$html);
               break;
           case 'all':
                $homepage="http://m.4d88.com/"; 
                $html = new \Htmldom($homepage);
                $result_array[]= $this->findLatestResultsFromContainer($search_date,'magnum-toto-damacai',$html);
                
                $homepage="http://m.4d88.com/loto88-stc-cashsweep.html"; 
                $html = new \Htmldom($homepage);
                $result_array[]= $this->findLatestResultsFromContainer($search_date,'sabah-sarawak-stc',$html);
                
                $homepage="http://4d88.com/singapore-pools.html"; 
                $html = new \Htmldom($homepage);
                $result_array[]= $this->findLatestResultsFromContainer($search_date,'singapore-pool',$html);
       }
       
       
      return $result_array;
       
    }
    /**
     *
     * @SWG\Api(
     *   path="/systemuse/getResultsByDate",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="getResults",
     *       notes="Returns a json",
     *       nickname="getResultsByDate",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="date",
     *           description="result's date (yyyy-mm-dd)",
     *           paramType="query",
     *           required=true,
     *           type="string"
     *          ),
     *         @SWG\Parameter(
     *           name="type",
     *           description="result's date (yyyy-mm-dd)",
     *           paramType="query",
     *           required=true,
     *           type="string",
     *           enum={"all","magnum-toto-damacai", "sabah-sarawak-stc","singapore-pool"},

     *          )
     * 
     *         )
     *     )
     *   )
     * )
     */
    public function apiGetResultsByDate()
    {
        $jsonResponse = new JsonResponse();
         
             
        $date = Input::get('date');
        $type = Input::get('type','all');
        
         
        $results=$this->getResults($date,$type);

        $response=array(
                'results'=>$results
         );
        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
    }
    
    /**
     *
     * @SWG\Api(
     *   path="/systemuse/getLatestResults",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="getResults",
     *       notes="Returns a json",
     *       nickname="getResultsByDate",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="type",
     *           description="result's date (yyyy-mm-dd)",
     *           paramType="query",
     *           required=true,
     *           type="string",
     *           enum={"all","magnum-toto-damacai", "sabah-sarawak-stc","singapore-pool"},

     *          )
     * 
     *         )
     *     )
     *   )
     * )
     */
    public function apiGetLatestResults()
    {
        $jsonResponse = new JsonResponse();
         
             
        $date=date('Y-m-d');
        $type = Input::get('type','all');
        
         
        $results=$this->getLatestResults($date,$type);

        $response=array(
                'results'=>$results
         );
        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
    }

    
     /**
     *
     * @SWG\Api(
     *   path="/systemuse/doAnalytics",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="doAnalytics",
     *       notes="Returns a json",
     *       nickname="doAnalytics",
     *     )
     *   )
     * )
     */
    public function apiDoAnalytics()
    {
        $jsonResponse = new JsonResponse();
         
             
      
        
         
        $this->doAnalytic();
        
        $sudokuResults=SudokuResult::get();
        $sudoku_result=array();
        
        foreach($sudokuResults as $sudokuResult){
            $sudoku_result[]=$sudokuResult->value;
        }
        
        $response=array(
              'sudokus'=>$sudoku_result
         );
        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
    }
    
    /**
     *
     * @SWG\Api(
     *   path="/systemuse/verifyReceipt",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="getResults",
     *       notes="Returns a json",
     *       nickname="getResultsByDate",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="purchaseToken",
     *           description="SKU",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *           defaultValue="pdgcccodjdkdibjghjobebej.AO-J1Owl8mdZNNQZnOHO0W-1W3jkVHbNTlErmw3UpgHI09Q0OlnkEPBanCKssoIas1HfD-6UdnW8T9kQ0W6WR-YgLR7O712JEz6-1u4H70WMnJKVyfjLPzX2FRRRB4Bs0EQoZ9NZVR69Ibt-P3_e8NoHpnURGaTElg"
     *          ),
     *         @SWG\Parameter(
     *           name="SKU",
     *           description="SKU",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *           enum={"tips.five.comsumable","tips.ten.comsumable", "tips.thirty.comsumable","tips.fifty.comsumable","tips.hundred.comsumable"},
     *          )
     * 
     *         )
     *     )
     *   )
     * )
     */
    public function apiVerifyReceipt()
    {
        $jsonResponse = new JsonResponse();
         
             
        $SKU = Input::get('SKU','');
        $purchaseToken= Input::get('purchaseToken','');
         
        $result=$this->getAndroidBilling($SKU,$purchaseToken);

//        echo $result->purchaseState;
//        exit;
        $response=array(
                'response'=>$result
         );
//        https://developers.google.com/android-publisher/api-ref/purchases/products#resource
//        
//       0. Yet to be consumed
//       1.Consumed
        
//        0. Purchased
//        1. Cancelled
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
    }
  
    
        /**
     *
     * @SWG\Api(
     *   path="/systemuse/pushBulkNotification",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="push reult to all participants",
     *       notes="Returns a json",
     *       nickname="pushBulkResultNotification",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="message",
     *           description="message",
     *           paramType="form",
     *           required=false,
     *           type="string",
     *          
     *          ),
     *         @SWG\Parameter(
     *           name="token",
     *           description="token",
     *           paramType="form",
     *           required=false,
     *           type="string",
     *          
     *          ),
     *         @SWG\Parameter(
     *           name="msg_type",
     *           description="action",
     *           paramType="form",
     *           required=false,
     *           type="string",
     *          enum={"normal","new_result","new_sudoku","jackport_result","jackport_new","thanks_donate"}        
     *          ),
     *         @SWG\Parameter(
     *           name="action",
     *           description="action",
     *           paramType="form",
     *           required=false,
     *           type="string",
     *          )
     *         )
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiPushBulkNotification()
    {
        $jsonResponse = new JsonResponse();
        
              $name = Input::get('message');
              $action =Input::get('action','MainActivity');
              $msg_type =Input::get('msg_type','normal');
              $token =Input::get('token');

              $description= "Click in to view more!";
       
              switch ($msg_type){
                  case "normal":
                  case "new_result":    
                      $action='activity_main';
                      break;
                  case "new_sudoku":
                      $action='activity_sudoku';
                      break;
                   case "jackport_result":
                      $action='activity_subscription';
                      break;
                   case "jackport_new":
                      $action='activity_subscription';
                      break;
                  case "thanks_donate":
                    $action='activity_subscription';
                    break;
              }
                  
           if(!$token){
               $token=Config::get('4dhuat.notification_key');
           }
         
         $data=array(
                  'id'=>0,
                  'msg_type'=>$msg_type,
                  'msg'=>$name,
                  'title'=>$name,
                  'body'=> $description

          );
                  
                  
        $result= $this->pushNotification($description,$data,$msg_type,$action,$token,$name);  
        
        $response=array(
                'message'=>$name,
                'description'=>$description,
                'android_send_result'=>$result
         );
        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
    }
    
    
           /**
     *
     * @SWG\Api(
     *   path="/systemuse/pushNewResultNotification",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="push NewResultNotification",
     *       notes="Returns a json",
     *       nickname="pushNewResultNotification"
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiPushNewResultNotification()
    {
        $jsonResponse = new JsonResponse();
        
           
                  
        $result= $this->pushNewResultNotification();  
        
        $response=array(
                'android_send_result'=>$result
         );
        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
    }
    
    /**
     *
     * @SWG\Api(
     *   path="/systemuse/pushAdminNotification",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="push AdminNotification",
     *       notes="Returns a json",
     *       nickname="pushAdminNotification"
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiPushAdminNotification()
    {
        $jsonResponse = new JsonResponse();
        
           
                  
        $result= $this->pushAdminNotification(10);  
        
        $response=array(
                'android_send_result'=>$result
         );
        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
    }
  
    
    public function pushNewResultNotification(){
        
        $token=Config::get('4dhuat.notification_key');
                                    $msg_type='new_result';
                                    $action='activity_main';
                                    $msg='';
                                    $data=array(
                                             'id'=>0,
                                             'msg_type'=>$msg_type,
                                             'msg'=>$msg,
                                             'title'=>'Click to view',
                                             'body'=> $msg

                                     );
        return $this->pushNotification($msg,$data,$msg_type,$action,$token,$msg); 
    }
    
    /**
     *
     * @SWG\Api(
     *   path="/systemuse/pushDeviceToGroup",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="pushDeviceToGroup",
     *       notes="Returns a json",
     *       nickname="pushDeviceToGroup",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="token",
     *           description="user's app token",
     *           paramType="form",
     *           required=true,
     *           type="string"
     *          )
     * )
     *       )
     *     )
     *   )
     * )
     */ 
    public function apipushDeviceToGroup()
    {
        $jsonResponse = new JsonResponse();
        
        $token = Input::get('token');

        $register_ids=array();
        $register_ids[]=$token;
        $result= $this->AddDeviceToGlobalGroup($register_ids);
        
        $response=array(
                'add_result'=>$result
        );
        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
    }
    
    
      /**
     *
     * @SWG\Api(
     *   path="/systemuse/createDeviceGroup",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="createDeviceGroup",
     *       notes="Returns a json",
     *       nickname="createDeviceGroup",

     *       )
     *     )
     *   )
     * )
     */ 
    public function apiCreateDeviceGroup()
    {
        $jsonResponse = new JsonResponse();
        
        $notification_key_name=Config::get('4dhuat.notification_key_name');
       
        $users=User::getAllAndroidUser()->get();
        $registration_ids=array();
        foreach($users as $user){

                $registration_ids[]=$user->android;

        }
        $topic_key=Config::get('4dhuat.notification_key_name');
        
           $response= $this->batchAddAppInstances($topic_key,$registration_ids);
              
        $response_array=array('xmpp_response'=>$response,'reg_id'=>$registration_ids);
        $jsonResponse->setResponse($response_array);

    	return $jsonResponse->get();
        
            
//            $message=array(
//                 'operation'=>'create',
//                 'notification_key_name'=>$notification_key_name,
//                 'registration_ids'=>$registration_ids,
//
//                 );
//                
//            $receiptObject= json_encode($message);
//    //                $receiptObject='{"operation":"create","notification_key_name":"phase_21","registration_ids":["cKl9Vws5H3k:APA91bGH15azCpwo8hAAAwP_Ni7fbJipSRjCAcEZhJf9oqTOm3zL1BAKgaYu64QkNnyeMeAec9TgmFhLgSAafb9IVkELeja4pGyFTLJQxPftfCleUJCI_Yd3SjgmkdEKbxgex4RhcMqq"]}';
//
//             $endpoint="https://android.googleapis.com/gcm/notification";
//             $serverKey=Config::get('4dhuat.SERVER_KEY');
//             $senderID=Config::get('4dhuat.SENDER_ID');
//
//            $options = [
//                'http' => [
//                    'header'  => "Content-Type:application/json\r\n" .
//                                 "Authorization:key=$serverKey\r\n".
//                                 "project_id:$senderID\r\n",
//                    'method'  => 'POST',
//                     'ignore_errors' => TRUE,
//                    'content' => $receiptObject
//                ],
//            ];
//            $context = stream_context_create($options);
//            $result = file_get_contents($endpoint, FALSE, $context);
//            if ($result === FALSE)
//            {
//    //                   echo json_encode($result);
//                throw new ServerErrorException('Error validating transaction.', 560);
//            }
//            // Decode json object (TRUE variable decodes as an associative array)
//            return json_decode($result, TRUE);
//       
//          
//        
//        $response=array(
//                'add_result'=>$result
//        );
//        
//        $jsonResponse->setResponse($response);
//
//    	return $jsonResponse->get();
        
    }
    
    public function doAnalytic(){
        
        $results=Result::getSudokuAnalytic()->limit(5)->get();
        
        $sudoku_date= date('Y-m-d', strtotime("-52 week"));

        $date= ResultDate::GetSudokuDate($sudoku_date)->first();
        $results_2=Result::getSudokuResultByDateID($date->id)->limit(5)->get();

         SudokuAnalytics::truncate();
         
         foreach($results as $result){
             
               $this->splitNumbers($result->r1);
               $this->splitNumbers($result->r2);
               $this->splitNumbers($result->r3);
   
                      
            $specials=$result->specials;
            foreach($specials as $special){
             
                   $special_val=$special->value;
                   $this->splitNumbers($special_val);
            }

            $consolations=$result->consolations;
            foreach($consolations as $consolation){
                  $special_val=$consolation->value;
                  $this->splitNumbers($special_val);
            }
         }
         
        foreach($results_2 as $result){
             
               $this->splitNumbers($result->r1);
               $this->splitNumbers($result->r2);
               $this->splitNumbers($result->r3);
   
                      
            $specials=$result->specials;
            foreach($specials as $special){
             
                   $special_val=$special->value;
                   $this->splitNumbers($special_val);
            }

            $consolations=$result->consolations;
            foreach($consolations as $consolation){
                  $special_val=$consolation->value;
                  $this->splitNumbers($special_val);
            }
         }
         
        $three_digits=SudokuAnalytics::GetFrequenceThreeDigits()->limit(2)->get();
        $last_two_digit=SudokuAnalytics::GetFrequenceTwoDigits()->skip(6)->first();
        $two_digits=SudokuAnalytics::GetFrequenceTwoDigits()->skip(2)->limit(4)->get();
        
         
        $last_two_digit_values=str_split($last_two_digit->two_digits);
       
       
        $three_digits_array=array();
        $result_array=array();
        $index=0;
       foreach($three_digits as $three_digit){
           
            $three_digit_values=str_split($three_digit->three_digits);
            $result_array = array_merge($result_array, $three_digit_values);
            $result_array[]=$last_two_digit_values[$index];
            $index++;
       }
       
        foreach($two_digits as $two_digit){
            $two_digit_values=str_split($two_digit->two_digits);
           
            $result_array= array_merge($result_array, $two_digit_values);
        }
        
       SudokuResult::truncate();
       
       foreach($result_array as $value){
          $SudokuResult =new SudokuResult();
          $SudokuResult->value=$value;
          $SudokuResult->save();
       }
       
         $token=Config::get('4dhuat.notification_key');
         $msg_type='new_sudoku';
         $action='activity_sudoku';
         $msg='';
         $data=array(
                  'id'=>0,
                  'msg_type'=>$msg_type,
                  'msg'=>$msg,
                  'title'=>'Click to view',
                  'body'=> $msg

          );
                  
                  
        $result= $this->pushNotification($msg,$data,$msg_type,$action,$token,$msg);  
    }
    
    public function splitNumbers($special_val){
        
        try {
                  $number_1 = substr($special_val,0, -1);
                  $number_2 = substr($special_val, 1);
                  $number_3 = substr($number_1,1);
                   
                  $two_digits_split=str_split($special_val,2);
                  $sudokuAnalytic=new SudokuAnalytics();
                  $sudokuAnalytic->three_digits=$number_1;
                  $sudokuAnalytic->two_digits=$two_digits_split[0];
                  $sudokuAnalytic->save();
                  
                  $sudokuAnalytic=new SudokuAnalytics();
                  $sudokuAnalytic->three_digits=$number_2;
                  $sudokuAnalytic->two_digits=$two_digits_split[1];
                  $sudokuAnalytic->save();
                  
                  $sudokuAnalytic=new SudokuAnalytics();
                  $sudokuAnalytic->three_digits=$number_1;
                  $sudokuAnalytic->two_digits=$number_3;
                  $sudokuAnalytic->save();
                  
                  $sudokuAnalytic=new SudokuAnalytics();
                  $sudokuAnalytic->three_digits=$number_2;
                  $sudokuAnalytic->two_digits=$number_3;
                  $sudokuAnalytic->save();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

                 
                  
    }
    public function findResultsFromContainer($search_date,$type,$container){
        $sabah_divs="";
        $final_divs="";
        $fived_divs="";
        $powerball_divs="";
        
       $results=array();
   
       foreach($container->find('.col-xs-12') as $div){
//           echo $div;
//           exit;
           
           try{
               $title=trim($div->find('.t1',0)->plaintext);
           }catch (Exception $exc) {
               continue;
           }

           
                $date=$div->find('.t2',0)->plaintext;
                $phase=$div->find('.t3',0)->plaintext;
//echo $title;
                   
                if($title=='DaMaCai 4D' || $title=='Toto 4D' || $title=='Magnum 4D' || $title=='CashSweep 4D' || $title=='Sandakan STC 4D' || $title=='Sabah Lotto88 4D' || $title=='SABAH LOTTO88 3D' || $title=='Sabah Lotto88 3D' || $title=='Singapore 4D'){
//                   echo $title;
                   
                    try {
                        $r1=$phase=$div->find('table th.r1',0)->plaintext;
                         $r2=$phase=$div->find('table th.r2',0)->plaintext;
                         $r3=$phase=$div->find('table th.r3',0)->plaintext; 
                    } catch (Exception $exc) {
     //                   echo $exc->getTraceAsString();
                        $r1='-';
                        $r2='-';
                        $r3='-';
                    }

                     $consolations=array();
                     $specials=array();

                     foreach($div->find('table tbody tr') as $consolation){
                         $index=0;
                         foreach($consolation->find('td') as $td){
                             if($index<=1){
                                  $specials[]=$td->plaintext;
                             }else{
                                 $consolations[]=$td->plaintext;
                             }
                            $index++;

                         }

                     }
           
                $results[]=array(
                          'title'=>$title,
                          'date'=>$date,
                          'phase'=>$phase,
                          'r1'=>$r1,
                          'r2'=>$r2,
                          'r3'=>$r3,
                          'specials'=>$specials,
                          'consolations'=>$consolations
                        );
            }else if($title=='MAGNUM 4D POWERBALL'){
               
                 $powerball_divs=$div;
                 
            }else if($title=='Toto 5D'){
                 $fived_divs=$div;
                 
            }else if($title=='Toto POWER 55'){
                $final_divs=$div;

            }else if($title=='Sabah Lotto88 6/45'){
                $sabah_divs=$div;

            }else if($title=='Singapore 6/45'){
                $sabah_divs=$div;
            }
            
           
          
          
       }
       
       if(!empty($powerball_divs)){
             foreach($powerball_divs->find('.panel-default') as $powerball_div){
           
                 try{
                     $title=trim($powerball_div->find('.t1',0)->plaintext);
                 }  catch (Exception $e){
                     continue;
                 }
                
                $date=$powerball_div->find('.t2',0)->plaintext;
                $phase=$powerball_div->find('.t3',0)->plaintext;
                
                $specials=array();
                $index=0;
                foreach($powerball_div->find('table tbody tr') as $consolation){
                    
                    if($index==0 || $index==2){
                        $special_string='';
                         foreach($consolation->find('td') as $td){
                                    
                                  $special_string=$special_string.' '.$td->plaintext;
                         }
                        $specials[] =trim(str_replace('&nbsp;','',$special_string));
                    }
                      $index++;
                }

                $results[]=array(
                 'title'=>$title,
                 'date'=>$date,
                 'phase'=>$phase,
                 'specials'=>$specials,
               );
           }
         }
         
       if(!empty($fived_divs)){
           foreach($fived_divs->find('.panel-default') as $final_div){
           
              
              
                $title=trim($final_div->find('.t1',0)->plaintext);
                $date=$final_div->find('.t2',0)->plaintext;
                $phase=$final_div->find('.t3',0)->plaintext;
                $r1='';
                if($title=='Toto 6D'){
                    $r1=trim($final_div->find('.r4',0)->plaintext);
                }

              $specials=array();
                foreach($final_div->find('table tbody tr') as $consolation){

                    $index=0;
                         foreach($consolation->find('td') as $td){

                             if($index==1 || $index==3){
                                   $specials[]=$td->plaintext;
                             }

                                  $index++;
                         }

                     }

                $results[]=array(
                 'title'=>$title,
                 'date'=>$date,
                 'phase'=>$phase,
                  'r1'=>$r1,
                 'specials'=>$specials,
                
               );
           }
       
       }
       
         if(!empty($final_divs)){
             foreach($final_divs->find('.panel-default') as $final_div){
           
                $title=trim($final_div->find('.t1',0)->plaintext);
                $date=$final_div->find('.t2',0)->plaintext;
                $phase=$final_div->find('.t3',0)->plaintext;
                $prize_amount=$final_div->find('.ss',0)->plaintext;

                foreach($final_div->find('table tbody tr') as $consolation){
                      $specials=array();
                         foreach($consolation->find('td') as $td){

                                  $specials[]=$td->plaintext;
                         }

                     }

                $results[]=array(
                 'title'=>$title,
                 'date'=>$date,
                 'phase'=>$phase,
                 'specials'=>$specials,
                 'prize_amount1'=>$prize_amount,
               );
           }
         }
         
          if(!empty($sabah_divs) ){
              
              $prize_amounts=array();
              foreach($sabah_divs->find('.ss') as $prize_amount){
                  $prize_amounts[]=$prize_amount->plaintext;
              }
              
             foreach($sabah_divs->find('.panel-default') as $final_div){
           
                $title=trim($final_div->find('.t1',0)->plaintext);
                $date=$final_div->find('.t2',0)->plaintext;
                $phase=$final_div->find('.t3',0)->plaintext;


                foreach($sabah_divs->find('table tbody tr') as $consolation){
                      $specials=array();
                         foreach($consolation->find('td') as $td){

                                  $specials[]=$td->plaintext;
                         }

                     }

                $results[]=array(
                 'title'=>$title,
                 'date'=>$date,
                 'phase'=>$phase,
                 'specials'=>$specials,
                 'prize_amount1'=>(sizeof($prize_amounts)>0)?$prize_amounts[0]:'',
                 'prize_amount2'=>(sizeof($prize_amounts)>1)?$prize_amounts[1]:'',
               );
           }
         }
       
       
//       exit;
       
       $this->saveData($search_date,$results,$type);
 
//      
//       Log::info('Log result', array('result'=>$results));

      return $results;
    }
    
        public function findLatestResultsFromContainer($search_date,$type,$container){
        $sabah_divs="";
        $final_divs="";
        $fived_divs="";
        $powerball_divs="";
        $sg_divs="";
        
       $results=array();
   
       foreach($container->find('.col-xs-12') as $div){
//           echo $div;
//           exit;
           
           try{
               $title=trim($div->find('.t1',0)->plaintext);
           }catch (Exception $exc) {
               continue;
           }

           
                $date=$div->find('.t2',0)->plaintext;
                $phase=$div->find('.t3',0)->plaintext;
//echo $title;
                   
                if($title=='DaMaCai 4D' || $title=='Toto 4D' || $title=='Magnum 4D' || $title=='CashSweep 4D' || $title=='Sandakan STC 4D' || $title=='Sabah Lotto88 4D' || $title=='SABAH LOTTO88 3D' || $title=='Sabah Lotto88 3D' || $title=='Singapore 4D'){
//                   echo $title;
                   
                    try {

                        $r1=trim(str_replace('&nbsp;','',$div->find('table th.r1',0)->plaintext));
                         $r2=trim(str_replace('&nbsp;','',$div->find('table th.r2',0)->plaintext));
                         $r3=trim(str_replace('&nbsp;','',$div->find('table th.r3',0)->plaintext));
                    } catch (Exception $exc) {
     //                   echo $exc->getTraceAsString();
                        $r1='-';
                        $r2='-';
                        $r3='-';
                    }

                     $consolations=array();
                     $specials=array();
                     
                     if($title != 'Singapore 4D'){
                        $index=0;
                     foreach($div->find('table tbody tr.s2') as $consolation){
                         
                         foreach($consolation->find('td') as $td){
                             
                             if(is_numeric($td->plaintext)){
                                  if($index<=2){
                                        $specials[]=$td->plaintext;
                                    }else{
                                        $consolations[]=$td->plaintext;
                                    }
                             }
                         }
                        $index++;
                     }
                }else{

                     foreach($div->find('table tbody tr') as $consolation){
                         $index=0;
                         foreach($consolation->find('td') as $td){
                             if($index<=1){
                                  $specials[]=$td->plaintext;
                             }else{
                                 $consolations[]=$td->plaintext;
                             }
                            $index++;

                         }

                     }
                }
                $results[]=array(
                          'title'=>$title,
                          'date'=>$date,
                          'phase'=>$phase,
                          'r1'=>$r1,
                          'r2'=>$r2,
                          'r3'=>$r3,
                          'specials'=>$specials,
                          'consolations'=>$consolations
                        );
            }else if($title=='MAGNUM 4D POWERBALL'){
               
                 $powerball_divs=$div;
                 
            }else if($title=='Toto 5D'){
                 $fived_divs=$div;
                 
            }else if($title=='Toto POWER 55'){
                $final_divs=$div;

            }else if($title=='Sabah Lotto88 6/45'){
                $sabah_divs=$div;

            }else if($title=='Singapore 6/45'){
                $sg_divs=$div;
            }
            
           
          
          
       }
       
       if(!empty($powerball_divs)){
             foreach($powerball_divs->find('.panel-default') as $powerball_div){
           
                 try{
                     $title=trim($powerball_div->find('.t1',0)->plaintext);
                 }  catch (Exception $e){
                     continue;
                 }
                
                $date=$powerball_div->find('.t2',0)->plaintext;
                $phase=$powerball_div->find('.t3',0)->plaintext;
                
                $specials=array();
                $index=0;
                foreach($powerball_div->find('table tbody tr') as $consolation){
                    
                    if($index==0 || $index==2){
                        $special_string='';
                         foreach($consolation->find('td') as $td){
                                    
                                  $special_string=$special_string.' '.$td->plaintext;
                         }
                        $specials[] =trim(str_replace('&nbsp;','',$special_string));
                    }
                      $index++;
                }

                $results[]=array(
                 'title'=>$title,
                 'date'=>$date,
                 'phase'=>$phase,
                 'specials'=>$specials,
               );
           }
         }
         
       if(!empty($fived_divs)){
           foreach($fived_divs->find('.panel-default') as $final_div){
           
              
              
                $title=trim($final_div->find('.t1',0)->plaintext);
                $date=$final_div->find('.t2',0)->plaintext;
                $phase=$final_div->find('.t3',0)->plaintext;
                $r1='';
                if($title=='Toto 6D'){
                    $r1=trim($final_div->find('.r4',0)->plaintext);
                }

              $specials=array();
                foreach($final_div->find('table tbody tr') as $consolation){

                    $index=0;
                         foreach($consolation->find('td') as $td){

                             if($index==1 || $index==3){
                                 
                                  if(is_numeric($td->plaintext)){
                                        $specials[]=$td->plaintext;
                                  }
                                 
                             }

                                  $index++;
                         }

                     }

                $results[]=array(
                 'title'=>$title,
                 'date'=>$date,
                 'phase'=>$phase,
                  'r1'=>$r1,
                 'specials'=>$specials,
                
               );
           }
       
       }
       
         if(!empty($final_divs)){
             foreach($final_divs->find('.panel-default') as $final_div){
           
                $title=trim($final_div->find('.t1',0)->plaintext);
                $date=$final_div->find('.t2',0)->plaintext;
                $phase=$final_div->find('.t3',0)->plaintext;
                $prize_amount=$final_div->find('.ss',0)->plaintext;

                foreach($final_div->find('table tbody tr') as $consolation){
                      $specials=array();
                         foreach($consolation->find('td') as $td){
                             
                            if(is_numeric($td->plaintext)){
                                $specials[]=$td->plaintext;
                            }
                         }

                     }

                $results[]=array(
                 'title'=>$title,
                 'date'=>$date,
                 'phase'=>$phase,
                 'specials'=>$specials,
                 'prize_amount1'=>$prize_amount,
               );
           }
         }
         
          if(!empty($sg_divs) ){
              
              $prize_amounts=array();
              foreach($sg_divs->find('.ss') as $prize_amount){
                  $prize_amounts[]=$prize_amount->plaintext;
              }
              
             foreach($sg_divs->find('.panel-default') as $final_div){
           
                $title=trim($final_div->find('.t1',0)->plaintext);
                $date=$final_div->find('.t2',0)->plaintext;
                $phase=$final_div->find('.t3',0)->plaintext;


                $consolation=$sg_divs->find('table tbody tr',0);
                
                $specials=array();
                foreach($consolation->find('td') as $td){

                    if(is_numeric($td->plaintext)){
                        $specials[]=$td->plaintext;
                  }
                }

                $results[]=array(
                 'title'=>$title,
                 'date'=>$date,
                 'phase'=>$phase,
                 'specials'=>$specials,
                 'prize_amount1'=>(sizeof($prize_amounts)>0)?$prize_amounts[0]:'',
                 'prize_amount2'=>(sizeof($prize_amounts)>1)?$prize_amounts[1]:'',
               );
           }
         }
                 if(!empty($sabah_divs) ){
              
              $prize_amounts=array();
              foreach($sabah_divs->find('.ss') as $prize_amount){
                  $prize_amounts[]=$prize_amount->plaintext;
              }
              
             foreach($sabah_divs->find('.panel-default') as $final_div){
           
                $title=trim($final_div->find('.t1',0)->plaintext);
                $date=$final_div->find('.t2',0)->plaintext;
                $phase=$final_div->find('.t3',0)->plaintext;


                foreach($sabah_divs->find('table tbody tr') as $consolation){
                      $specials=array();
                         foreach($consolation->find('td') as $td){

                             if(is_numeric($td->plaintext)){
                                        $specials[]=$td->plaintext;
                                  }
                         }

                     }

                $results[]=array(
                 'title'=>$title,
                 'date'=>$date,
                 'phase'=>$phase,
                 'specials'=>$specials,
                 'prize_amount1'=>(sizeof($prize_amounts)>0)?$prize_amounts[0]:'',
                 'prize_amount2'=>(sizeof($prize_amounts)>1)?$prize_amounts[1]:'',
               );
           }
         }
       
//       exit;
     
       $this->saveData($search_date,$results,$type);
 
//      
//       Log::info('Log result', array('result'=>$results));

      return $results;
    }
    
    public function saveData($search_date,$results,$type){
        
        
        $result_date= ResultDate::where('status','active')->where('date',$search_date)->first();
      if(!$result_date){
           $result_date=new ResultDate();
            $result_date->date=$search_date;
            $result_date->day=date("D", strtotime($search_date));
            $result_date->save();
      }
           Log::info('Log date', array('date'=>$result_date->date));

     
      foreach($results as $result){
          $title=$result['title'];
          $date=$result['date'];
          $phase=$result['phase'];
          $prize_amount1=isset($result['prize_amount1'])?$result['prize_amount1']:'';
          $prize_amount2=isset($result['prize_amount2'])?$result['prize_amount2']:'';
              
          $result_record=Result::where('date_id',$result_date->id)->where('title',$title)->first();
          if(!$result_record){
                $result_record=new Result();
                
          }
                $result_record->date_id=$result_date->id;
                $result_record->title=$title;
                $result_record->date=$date;
                $result_record->phase=$phase;
                $result_record->title=$title;
                $result_record->title_bck=$title;
                $result_record->prize_amount1=$prize_amount1;
                $result_record->prize_amount2=$prize_amount2;
                $result_record->type=$type;
           
         
           
            if($title=='DaMaCai 4D' || $title=='Toto 4D' || $title=='Magnum 4D'  || $title=='CashSweep 4D' || $title=='Sandakan STC 4D' || $title=='Sabah Lotto88 4D' || $title=='SABAH LOTTO88 3D' || $title=='Sabah Lotto88 3D' || $title=='Singapore 4D'){
                 
//               echo $title;
//               exit;
                    $result_record->r1=$result['r1'];
                    $result_record->r2=$result['r2'];
                    $result_record->r3=$result['r3'];
                    $result_record->save();
                    
                    ResultConsolation::where('result_id',$result_record->id)->where('type','special')->delete();

                    for($i=0;$i<sizeof($result['specials']);$i++){
                        
                        $result_consulation=ResultConsolation::where('result_id',$result_record->id)
                         ->where('value',$result['specials'][$i])
                         ->where('type','special')->first();
                        
                        if(!$result_consulation){
                            $result_consulation=new ResultConsolation();
                        }
                        
                        $result_consulation->result_id=$result_record->id;
                        $result_consulation->value=$result['specials'][$i];
                        $result_consulation->type='special';
                        $result_consulation->save();
                    }
                    
                    ResultConsolation::where('result_id',$result_record->id)->where('type','consolation')->delete();

                     for($i=0;$i<sizeof($result['consolations']);$i++){
                         

                         $result_consulation=ResultConsolation::where('result_id',$result_record->id)
                                ->where('value',$result['consolations'][$i])
                                ->where('type','consolation')->first();

                               if(!$result_consulation){
                                   $result_consulation=new ResultConsolation();
                               }
                        
//                        $result_consulation=new ResultConsolation();
                        $result_consulation->result_id=$result_record->id;
                        $result_consulation->value=$result['consolations'][$i];
                        $result_consulation->type='consolation';
                        $result_consulation->save();
                    }
            }else{
                
                if($title=='Toto 6D'){
                    
                      $result_record->r1=$result['r1'];
                }
                    $result_record->save();
                    
                    for($i=0;$i<sizeof($result['specials']);$i++){
                        
//                        if($title=='MAGNUM 4D POWERBALL'){
//                            $result_consulation=ResultConsolation::where('result_id',$result_record->id)
//                                                
//                                                ->where('type','special')->first(); 
//                        }else{
//                             $result_consulation=ResultConsolation::where('result_id',$result_record->id)
//                                                ->where('value',$result['specials'][$i])
//                                                ->where('type','special')->first();
//                        }
                          $result_consulation=ResultConsolation::where('result_id',$result_record->id)
                                                ->where('value',$result['specials'][$i])
                                                ->where('type','special')->first();
                       
                        
                        if(!$result_consulation){
                            $result_consulation=new ResultConsolation();
                        }
                        
                        $result_consulation->result_id=$result_record->id;
                        $result_consulation->value=$result['specials'][$i];
                        $result_consulation->type='special';
                        $result_consulation->save();
                    }
            }
            
            
      }
      
      
    }
    
    
    public function getTBGResults($page){
      
       
        
//       $homepage="http://www.4dmanager.com/qzt/gym/".$page; 
//        $homepage="http://www.4dmanager.com/qzt/tpk/".$page; 
       
       $homepage="http://www.4dmanager.com/qzt/wzt/".$page; 
       
       $html = new \Htmldom($homepage);
       
       $results=array();
//        echo $homepage;
//        echo $html->plaintext;
//        exit;
       foreach($html->find('ul.qzt-page-list li') as $li){
          $image= $li->find('img',0)->src;
          
          $content_array=array();
          foreach($li->find('.content') as $content){
              $content_array[]=$content->plaintext;
          }
          $results[]=array('image'=>$image,'contents'=>$content_array);
          
          
         $tbgList= TbgList::where('number',$content_array[0])->where('type','wzt')->first();
         
         if(!$tbgList){
             $tbgList= new TbgList();
         }
         $tbgList->number=$content_array[0];
         $tbgList->name=$content_array[3];
         $tbgList->name_cn=$content_array[2];
         $tbgList->image=$image;
         $tbgList->type='wzt';
         $tbgList->save();
         
          $image_path=uniqid(time()).'.png';
          $filePath=TGB_PATH . DIRECTORY_SEPARATOR .$tbgList->id;
            if(!File::exists($filePath)) @mkdir($filePath);

             $this->downloadFile($tbgList->image,$filePath.'/'.$image_path);
             $tbgList->image=$image_path;
             $tbgList->save();
             
       }
       
       
       
      return $results;
       
    }
    
   private function downloadFile($url, $path)
    {
      
        $opts = array (
            'http' => array (
                'method' => "GET",
                'user_agent' =>'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
            )
        );
        $context = stream_context_create($opts);

        $newfname = $path;
        $file = fopen ($url, 'rb',false, $context);

        
        if ($file) {
            
            try {
                 $newf = fopen ($newfname, 'wb');
            } catch (Exception $exc) {
                echo $exc->getMessage();
                exit;
            }

           
            if ($newf) {
                while(!feof($file)) {
                    fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
                }
            }
        }
        if ($file) {
            fclose($file);
        }
        if ($newf) {
            fclose($newf);
        }
    }
    

        public function batchAddAppInstances($topic_key,$reg_ids)
        {

        $array_result=array('status'=>1,'result'=>array());

            $message=array(
                'to'=>"/topics/$topic_key",
                "registration_tokens"=> $reg_ids

            );

           $receiptObject= json_encode($message,JSON_UNESCAPED_SLASHES);

            $endpoint="https://iid.googleapis.com/iid/v1:batchAdd";
             $serverKey=Config::get('4dhuat.SERVER_KEY');
             $senderID=Config::get('4dhuat.SENDER_ID');

           $options = [
               'http' => [
                   'header'  => "Content-Type:application/json\r\n" .
                                "Authorization:key=$serverKey\r\n",
                   'method'  => 'POST',
                   'content' => $receiptObject
               ],
           ];
           $context = stream_context_create($options);
           $result=false;
               
               try {
                   $result = file_get_contents($endpoint, FALSE, $context);
               } catch (Exception $exc) {
                   $array_result['status']=0;
                   
                   $array_result['message']=$exc->getMessage();
               }
           
           // Decode json object (TRUE variable decodes as an associative array)
            $array_result['result']=json_decode($result, TRUE);
            return $array_result;
        } 
}

