<?php

 
use Swagger\Annotations as SWG;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;

/**
 * @SWG\Resource(
 * 	apiVersion="1.0",
 *	resourcePath="/jackport",
 *	description="jackport operations",
 *	produces="['application/json']"
 * )
 */
class JackportController extends BaseController{

        /**
     *
     * @SWG\Api(
     *   path="/jackport/getCurrent",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="get current jackport",
     *       notes="Returns a json",
     *       nickname="getCurrent",
     *       )
     *     )
     *   )
     * )
     */    
   public function apiGetCurrent(){
       
        $jsonResponse = new JsonResponse();
       $currentUser=Auth::user();
       $userID=0;
        $current_phase=false;
        
//         $jsonResponse->setCode(400);
//            $jsonResponse->setSubject('系统维修');
//            $jsonResponse->setBody('系统维修，稍后后再试.');
//
//            return $jsonResponse->get();
        $jackport=  Jackport::getActiveJackport()->first();
        
        $current_phase_array= new ArrayObject();
        if($jackport){
            $current_phase=  JackportPhase::find($jackport->current_phase_id);
            
            $current_phase_array=$this->jackportPhaseToJson($current_phase);
        }
  
        if($currentUser!=null){
            $userID=$currentUser->id;
        }
        
        $bid_number_array=array();
        if($current_phase){
            $jackportBids=JackportBids::GetUserbids($current_phase->id,$userID)->orderBy('id','desc')->take(50)->get();
        
            foreach($jackportBids as $jackportBid){
                $bid_number_array[]=$this->JackportBidToJson($jackportBid);
            }
        }
        
        
          
          $response = array('phase'=>$current_phase_array,'jackportBids'=>$bid_number_array);
          $jsonResponse->setResponse($response);
          return $jsonResponse->get();
            
    }
    
    
    /**
     *
     * @SWG\Api(
     *   path="/jackport/freeNumber",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="freeNumber",
     *       notes="Returns a json",
     *       nickname="freeNumber",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="phase_id",
     *           description="phase_id",
     *           paramType="form",
     *           required=true,
     *           type="string"
     * 
     *          )
     * )
     *       )
     *     )
     *   )
     * )
     */    
   public function apiGetFreeNumber(){
       
        $jsonResponse = new JsonResponse();
      
        $currentUser=Auth::user();
        $phase_id=Input::get('phase_id',0);
        
        if($currentUser->redeem_phase==$phase_id){
            
            $jsonResponse->setCode(400);
            $jsonResponse->setSubject('One time per user');
            $jsonResponse->setBody('Every user only can redeem one time on every round.');

            return $jsonResponse->get();
        }
        
        DB::beginTransaction();         

            try {

                
                $jackportPhase=JackportPhase::find($phase_id);
        
                if(!$jackportPhase){

                    $jsonResponse->setCode(400);
                    $jsonResponse->setSubject('Server Busy');
                    $jsonResponse->setBody('Jackport round not found.');

                    return $jsonResponse->get();
                }

                if($jackportPhase->current_join >= $jackportPhase->require_join){

                    $jackportPhase->status='waiting';
                    $jackportPhase->save();
                    $jackport=$jackportPhase->jackport;
                    $this->openNextRound($jackport);
                }

                $jackportPhase->increment('current_join');
                $jackportPhase->increment('current_redeem');
                

                $jackportBids= new JackportBids();
                $jackportBids->phase_id=$phase_id;
                $jackportBids->save();
                
                $currentUser->redeem_phase=$phase_id;
                $currentUser->save();
                 
                 DB::commit();



             }catch (\Exception $e) {         

            Log::error('apiGetFreeNumber: ' . $e->getMessage());

                        DB::rollback();

                        $jsonResponse->setCode(503);
                        $jsonResponse->setSubject('Network problem');
                        $jsonResponse->setBody('Server is busy. Please try again later');

                        return $jsonResponse->get();

             }
 
        
        
        $jackportPhase_array=$this->jackportPhaseToJson($jackportPhase);
        $jackportBids=JackportBids::GetUserbids($phase_id,$currentUser->id)->orderBy('id','desc')->take(1)->get();
        $bid_number_array=array();
        foreach($jackportBids as $jackportBid){
            $bid_number_array[]=$this->JackportBidToJson($jackportBid);
        }
        $response = array('phase'=>$jackportPhase_array,'jackportBids'=>$bid_number_array);
        $jsonResponse->setResponse($response);
        return $jsonResponse->get();
            
    }
    
     /**
     *
     * @SWG\Api(
     *   path="/jackport/bid",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="bid",
     *       notes="Returns a json",
     *       nickname="bid",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="phase_id",
     *           description="phase_id",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *          ),
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
     *          ),
     *         @SWG\Parameter(
     *           name="orderID",
     *           description="orderID",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *          )
     * )
     *       )
     *     )
     *   )
     * )
     */    
   public function apiBidJackport(){
       
        $jsonResponse = new JsonResponse();
      
        $currentUser=Auth::user();
        $phase_id=Input::get('phase_id',0);
        $SKU = Input::get('SKU','');
        $purchaseToken= Input::get('purchaseToken','');
        $OrderID = Input::get('orderID','');
        
        $existingClaimedReciept =  PaymentReceipt::GetExistingClaimedReciept($purchaseToken,$SKU)->first();
         
         if($existingClaimedReciept){
             
             $jsonResponse->setCode(400);
             $jsonResponse->setSubject('Invalid Claim');
             $jsonResponse->setBody('Error on claim on:'.$purchaseToken);
             
             Log::error('apiBidJackport: ' .'Error on Claim',array("purchaseToken"=>$purchaseToken));

            return $jsonResponse->get();
         }
         
         
        $paymentReceipt=new PaymentReceipt();
        $paymentReceipt->SKU=$SKU;
        $paymentReceipt->purchase_token=$purchaseToken;
        $paymentReceipt->orderID=$OrderID;
        
         $receiptData=$this->getAndroidBilling($SKU,$purchaseToken);
        
         if($receiptData==null || !isset($receiptData['purchaseState']) || $receiptData['purchaseState']!=0){
             $jsonResponse->setCode(400);
             $jsonResponse->setSubject('Invalid Purchase');
             $jsonResponse->setBody('Error on purchase on: '.$purchaseToken);

             $paymentReceipt->save();
             Log::error('apiBidJackport: ' .'Error on purchase',array("purchaseToken"=>$purchaseToken));

            return $jsonResponse->get();
         }
         

        $revenue=0;
        switch ($SKU){
            case RM_FIVE:
                $revenue=4;
            break;
            case RM_TEN:
                $revenue=8;
            break;
            case RM_THIRTY:
                $revenue=25;
             break;
            case RM_FIFTY:
                $revenue=43;
             break;
            case RM_HUNDRED:
                $revenue=88;
            break;
        }
        $today=date('Y-m-d H:i:s');
        DB::beginTransaction();         

            try {
               
                $paymentReceipt->consumptionState=$receiptData['consumptionState'];
                $paymentReceipt->developerPayload=$receiptData['developerPayload'];
                $paymentReceipt->kind=$receiptData['kind'];
                $paymentReceipt->purchaseState=$receiptData['purchaseState'];
                $paymentReceipt->purchaseTimeMillis=$receiptData['purchaseTimeMillis'];
                $paymentReceipt->save();
                
                if(!empty($phase_id)){
                    $jackportPhase=JackportPhase::find($phase_id);
                }else{
                    $jackport=  Jackport::getActiveJackport()->first();
        
                    if($jackport){
                        $jackportPhase=  JackportPhase::find($jackport->current_phase_id);
                        $phase_id=$jackportPhase->id;
                    }
                }
                
        
                if(!$jackportPhase){

                    $jsonResponse->setCode(400);
                    $jsonResponse->setSubject('Server Busy');
                    $jsonResponse->setBody('Jackport round not found.');

                    return $jsonResponse->get();
                }

                 for($i=0;$i<$revenue;$i++){

                    $phaseRecords[]=array(
                      'phase_id'=>$phase_id,
                      'created_by'=>$currentUser->id,
                      'created_on'=>$today
                    );

                }
                $jackportBids=  JackportBids::insert($phaseRecords);
                $jackportPhase->increment('current_join',$revenue);
                
                if($jackportPhase->current_join >= $jackportPhase->require_join){

                    $jackportPhase->status='waiting';
                    $jackportPhase->save();
                    $jackport=$jackportPhase->jackport;
                    $this->openNextRound($jackport);
                }

               
                $paymentReceipt->is_claimed='true';
                $paymentReceipt->save();
                 DB::commit();



             }catch (\Exception $e) {         

            Log::error('apiBidJackport: ' . $e->getMessage());

                        DB::rollback();

                        $jsonResponse->setCode(503);
                        $jsonResponse->setSubject('Network problem');
                        $jsonResponse->setBody('Server is busy. Please try again later');

                        return $jsonResponse->get();

             }
 
        
        
        $jackportPhase_array=$this->jackportPhaseToJson($jackportPhase);
        $jackportBids=JackportBids::GetUserbids($phase_id,$currentUser->id)->orderBy('id','desc')->take($revenue)->get();
        $bid_number_array=array();
        foreach($jackportBids as $jackportBid){
            $bid_number_array[]=$this->JackportBidToJson($jackportBid);
        }
        
        try {
            $this->pushAdminNotification($SKU,$currentUser);
        } catch (Exception $exc) {
//            echo $exc->getTraceAsString();
        }

        $response = array('phase'=>$jackportPhase_array,'jackportBids'=>$bid_number_array);
        $jsonResponse->setResponse($response);
        return $jsonResponse->get();
            
    }
    
    
     /**
     *
     * @SWG\Api(
     *   path="/jackport/getPassResult",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="getPassResult",
     *       notes="Returns a json",
     *       nickname="getPassResult",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="pageLength",
     *           description="page's length",
     *           paramType="query",
     *           required=false,
     *           type="integer"
     *          ),
     *         @SWG\Parameter(
     *           name="page",
     *           description="page number",
     *           paramType="query",
     *           required=false,
     *           type="integer"
     *          )
     * 
     *         )
     *       )
     *     )
     *   )
     * )
     */   
   public function apiGetPassResult(){
       
       $jsonResponse = new JsonResponse();
       $pageLength=Input::get('pageLength',25);
       $page=Input::get('page',1);
       
        
        $jackport_phases=  JackportPhase::getPassedJackport()->paginate($pageLength);
        
        $phase_array= array();
        foreach($jackport_phases as $jackport_phase){

            $phase_array[]=$this->jackportPhaseToJson($jackport_phase);
        }

          
          $response = array('phases'=>$phase_array);
          $jsonResponse->setResponse($response);
          return $jsonResponse->get();
            
    }
    
    
    /**
     *
     * @SWG\Api(
     *   path="/jackport/getBidNumbers",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="get Bid Numbers",
     *       notes="Returns a json",
     *       nickname="getBidNumbers",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="phase_id",
     *           description="phase_id",
     *           paramType="form",
     *           required=true,
     *           type="string"
     *          ),
     *         @SWG\Parameter(
     *           name="pageLength",
     *           description="page's length",
     *           paramType="query",
     *           required=false,
     *           type="integer"
     *          ),
     *         @SWG\Parameter(
     *           name="page",
     *           description="page number",
     *           paramType="query",
     *           required=false,
     *           type="integer"
     *          )
     *         )
     *       )
     *     )
     *   )
     * )
     */    
   public function apiGetBidNumbers(){
       
        $jsonResponse = new JsonResponse();
        $phase_id=Input::get('phase_id',0);
        $pageLength=Input::get('pageLength',25);
        $page=Input::get('page',1);

        $jackportBids=JackportBids::GetPhaseBids($phase_id)->paginate($pageLength);
        
        $bid_number_array=array();
        foreach($jackportBids as $jackportBid){
            $bid_number_array[]=$this->jackportBidWithUserToJson($jackportBid);
        }
          
          $response = array('jackportBids'=>$bid_number_array);
          $jsonResponse->setResponse($response);
          return $jsonResponse->get();
            
    }
    
        /**
     *
     * @SWG\Api(
     *   path="/jackport/getMyBidsNumbers",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="get Bid Numbers",
     *       notes="Returns a json",
     *       nickname="getMyBidsNumbers",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="phase_id",
     *           description="phase_id",
     *           paramType="form",
     *           required=true,
     *           type="string"
     *          ),
     *         @SWG\Parameter(
     *           name="pageLength",
     *           description="page's length",
     *           paramType="query",
     *           required=false,
     *           type="integer"
     *          ),
     *         @SWG\Parameter(
     *           name="page",
     *           description="page number",
     *           paramType="query",
     *           required=false,
     *           type="integer"
     *          )
     *         )
     *       )
     *     )
     *   )
     * )
     */    
   public function apiGetMyBidNumbers(){
       
        $jsonResponse = new JsonResponse();
        $phase_id=Input::get('phase_id',0);
        $pageLength=Input::get('pageLength',35);
        $page=Input::get('page',1);
        $currentUser=Auth::user();

        $jackportBids=JackportBids::GetUserbids($phase_id,$currentUser->id)->paginate($pageLength);
        
        $bid_number_array=array();
        foreach($jackportBids as $jackportBid){
            $bid_number_array[]=$this->JackportBidToJson($jackportBid);
        }
          
          $response = array('jackportBids'=>$bid_number_array);
          $jsonResponse->setResponse($response);
          return $jsonResponse->get();
            
    }
   
 
    

}