<?php

 
use Swagger\Annotations as SWG;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;

/**
 * @SWG\Resource(
 * 	apiVersion="1.0",
 *	resourcePath="/sms",
 *	description="sms operations",
 *	produces="['application/json']"
 * )
 */
class SMSController extends BaseController{

    
    /**
     *
     * @SWG\Api(
     *   path="/sms/comfirmTrans",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="comfirm tracking",
     *       notes="Returns a json",
     *       nickname="comfirm",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="transid",
     *           description="transid",
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
    public function apiComfirmTrans()
    {
        $jsonResponse = new JsonResponse();
        $response = '';
        
        

        $transid = Input::get('transid');
        
        $subscriber=Subscriber::where('trans_id',$transid)->first();
        if($subscriber){
             $subscriber->status='confirm';
             $subscriber->save();
        }
       
        
        echo 'ok';
        exit;
        
        
//        $response=array(
//          'transid'=>$transid
//        );
//        
//        $jsonResponse->setResponse($response);
//
//    	return $jsonResponse->get();
        

    }

    
    /**
     *
     * @SWG\Api(
     *   path="/sms/subscribe",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="subscribe",
     *       notes="Returns a json",
     *       nickname="subscribe",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="mobile_no",
     *           description="mobile_no",
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
    public function apiSubscribe()
    {
        $jsonResponse = new JsonResponse();
 
        

        $mobile_no = Input::get('mobile_no');
        
        $subscribe=  new Subscriber();
        $subscribe->mobile=$mobile_no;
        $subscribe->trans_id=rand(1,999).time();
        $subscribe->save();
        
        
        $response=array(
          'transid'=>$this->subscriberToJson($subscribe)
        );
        
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