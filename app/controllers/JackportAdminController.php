<?php

 
use Swagger\Annotations as SWG;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;

/**
 * @SWG\Resource(
 * 	apiVersion="1.0",
 *	resourcePath="/jackportAdmin",
 *	description="jackport admin operations",
 *	produces="['application/json']"
 * )
 */
class JackportAdminController extends BaseController{

        /**
     *
     * @SWG\Api(
     *   path="/jackportAdmin/create",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="create jackport",
     *       notes="Returns a json",
     *       nickname="jackport",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="title",
     *           description="title",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *           defaultValue=""
     *          ),
     *         @SWG\Parameter(
     *           name="description",
     *           description="description",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *           defaultValue="号码［0001-2000］,直到派完为止"
     *          ),
     *         @SWG\Parameter(
     *           name="reward",
     *           description="reward (MYR)",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *           defaultValue="1000"
     *          ),
     *         @SWG\Parameter(
     *           name="allow_free",
     *           description="allow free",
     *           paramType="form",
     *           required=true,
     *           type="integer",
     *           defaultValue="500"
     *          ),
     *         @SWG\Parameter(
     *           name="require_join",
     *           description="require user join",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *           defaultValue="2000"
     *          ),
     *         @SWG\Parameter(
     *           name="total_round",
     *           description="total round to set",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *           defaultValue="3"
     *          ),
     *         @SWG\Parameter(
     *           name="result_method",
     *           description="result_method",
     *           paramType="form",
     *           required=true,
     *           type="string",
     *           enum={"toto_1","damacai_1","magnum_1","toto_2","damacai_2","magnum_2","toto_3","damacai_3","magnum_3"}
     *          ),
     *       )
     *       )
     *     )
     *   )
     * )
     */    
   public function apiCreate(){
       
        $jsonResponse = new JsonResponse();
        $title=Input::get('title','');
        $description=Input::get('description','');
        $reward=Input::get('reward','');
        $require_join=Input::get('require_join','');
        $result_method=Input::get('result_method','');
        $total_round=Input::get('total_round',1);        
        $allow_free=Input::get('allow_free',0);


   
        DB::beginTransaction();         

        $phase_array=array();
        try {

                $jackport=new Jackport();
                $jackport->title=$title;
                $jackport->description=$description;
                $jackport->reward=$reward;
                $jackport->require_join=$require_join;
                $jackport->result_method=$result_method;
                $jackport->allow_free=$allow_free;
                $jackport->save();
                
                for($i=1;$i<=$total_round;$i++){
                 $jackportPhase= new JackportPhase();
                 $jackportPhase->jackport_id=$jackport->id;
                 $jackportPhase->round=$i;
                 $jackportPhase->winner_id=null;
                 $jackportPhase->won_number=null;
                 $jackportPhase->require_join=$require_join;
                 $jackportPhase->save();
                 $phase_array[]=$this->jackportPhaseToJson($jackportPhase);
                 
                 if($i==1){
                     $current_phase_id=$jackportPhase->id;
                 }
                }
                $jackport->current_phase_id=$current_phase_id;
                $jackport->save();
                
                DB::commit();

                


            }catch (\Exception $e) {         

                        Log::error('apiCreate: ' . $e->getMessage());

                       DB::rollback();

                       $jsonResponse->setCode(503);
                       $jsonResponse->setSubject('Network problem');
                       $jsonResponse->setBody('Server is busy. Please try again later');
                       return $jsonResponse->get();

            }
        
//"幸运号将在号码派完的该日算起的第一个toto开采后公布";

          
          $response = array('phases'=>$phase_array);
          $jsonResponse->setResponse($response);
          return $jsonResponse->get();
            
    }
    
    
   
}