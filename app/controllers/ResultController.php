<?php

 
use Swagger\Annotations as SWG;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;

/**
 * @SWG\Resource(
 * 	apiVersion="1.0",
 *	resourcePath="/results",
 *	description="results operations",
 *	produces="['application/json']"
 * )
 */
class ResultController extends BaseController{

    
    /**
     *
     * @SWG\Api(
     *   path="/results/latest",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="list latest",
     *       notes="Returns a json",
     *       nickname="listLatest"
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiListLatest()
    {
        $jsonResponse = new JsonResponse();

        $announcement="";
        $lastest_date=ResultDate::GetMaxDate()->first();
        
        
        $results=Result::getResultByDateID($lastest_date->id)->get();
        
        $result_array1=array();
        $result_array2=array();
        $result_array3=array();
       foreach($results as $result){
           switch($result->type){
               case 'magnum-toto-damacai':
                     $result_array1[]=$this->resultToJson($result);
                   break;
               case 'sabah-sarawak-stc':
                   $result_array2[]=$this->resultToJson($result);
                   break;
                case 'singapore-pool':
                   $result_array3[]=$this->resultToJson($result);
                   break;
           }
         
       }
        
        $response=array(
        'banner'=>URL::asset('assets/images/event_banner_launch.png'), 'announcement'=>$announcement, 'west'=>$result_array1,'east'=>$result_array2,'sg'=>$result_array3
        );
        
       
        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        

    }

    
    
     /**
     *
     * @SWG\Api(
     *   path="/results/listByDate",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="list result by date",
     *       notes="Returns a json",
     *       nickname="listByDate",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="date_id",
     *           description="page's length",
     *           paramType="query",
     *           required=false,
     *           type="integer"
     *          ),
     *         @SWG\Parameter(
     *           name="version_code",
     *           description="version_code",
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
    public function apiListResultByDate()
    {
        $jsonResponse = new JsonResponse();

         $announcement="";
         
    
        $date_id = Input::get('date_id');
        $version_code = Input::get('version_code',0);
        
        if($version_code<2017032101){
            $announcement="MYR1000.00 抽奖活动已开始，请到play商店查找 ‘fourdhuat’更新您的app。 \nPlease download new app from play store (search 'fourdhuat') to get MYR1000.00 lucky draw event! ";
        }
        if(empty($date_id)){
             $lastest_date=ResultDate::GetMaxDate()->first();
             $results=Result::getResultByDateID($lastest_date->id)->get();
        }else{
            $lastest_date=ResultDate::find($date_id);
            $results=Result::getResultByDateID($date_id)->get();
        }
        
      
        $result_array1=array();
        $result_array2=array();
        $result_array3=array();
       foreach($results as $result){
           switch($result->type){
               case 'magnum-toto-damacai':
                     $result_array1[]=$this->resultToJson($result);
                   break;
               case 'sabah-sarawak-stc':
                   $result_array2[]=$this->resultToJson($result);
                   break;
                case 'singapore-pool':
                   $result_array3[]=$this->resultToJson($result);
                   break;
           }
         
       }
        
        $response=array(
       'banner'=>URL::asset('assets/images/event_banner_launch.png'), 'date'=>$this->dateToJson($lastest_date), 'announcement'=>$announcement,  'west'=>$result_array1,'east'=>$result_array2,'sg'=>$result_array3
        );
        
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        
        

    }
    
    /**
     *
     * @SWG\Api(
     *   path="/results/listDates",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="list dates",
     *       notes="Returns a json",
     *       nickname="listDates",
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
    public function apiListDates()
    {
        $jsonResponse = new JsonResponse();

        $page = Input::get('page', 1);
        $pageLength = Input::get('pageLength', 20);
        
        $dates=ResultDate::where('status','active')->orderBy('date','desc')->paginate($pageLength);
        
        $date_array=array();
        foreach($dates as $date){
            $date_array[]=$this->dateToJson($date);
        }
      $response=array('dates'=>$date_array);
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        

    }
    
    /**
     *
     * @SWG\Api(
     *   path="/results/listTbg",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="list Tbg",
     *       notes="Returns a json",
     *       nickname="listTbg",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="type",
     *           description="page's length",
     *           paramType="query",
     *           required=false,
     *           type="string",
     *          enum={"tpk","gym","wzt"}
     *          )
     * )
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiListTBG()
    {
        $jsonResponse = new JsonResponse();

        $type = Input::get('type', 'tpk');
        
        $tbgLists=TbgList::where('type',$type)->get();
        
        $date_array=array();
        foreach($tbgLists as $tbgList){
            $tbg_array[]=$this->TBGToJson($tbgList);
        }
         $response=array('tbgs'=>$tbg_array);
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        

    }
    
    
    /**
     *
     * @SWG\Api(
     *   path="/results/getLuckyNumReport",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="get Lucky Number Report",
     *       notes="Returns a json",
     *       nickname="getLuckyNumReport",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="number",
     *           description="lucky's number",
     *           paramType="form",
     *           required=true,
     *           type="integer"
     *          )
     * 
     *         )
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiGetLuckyNumReport()
    {
        $jsonResponse = new JsonResponse();

        $number = Input::get('number');
      

        $top3s=Result::getResultByNumber($number)->get();
        
        $array_1r=array();
        $array_2r=array();
        $array_3r=array();
        $array_special=array();
        $array_consolation=array();
        
        foreach($top3s as $top3){
            
    
            switch($number){
                case $top3->r1:
                     $array_1r[]=array('date'=>$top3->date,'title'=>$top3->title,'number'=>$number);
                   break;
                case $top3->r2:
                     $array_2r[]=array('date'=>$top3->date,'title'=>$top3->title,'number'=>$number);
                   break;
               case $top3->r3:
                     $array_3r[]=array('date'=>$top3->date,'title'=>$top3->title,'number'=>$number);
                   break;
                }
        }
        $number_1 = substr($number, 1);
        $number_2 = substr($number,0, -1);
     
        $tbg_results=  TbgList::GetSimilarResultByNumber($number_1,$number_2)->get();
        
        $tbg_array= array();
        foreach($tbg_results as $tbg_result){
            $tbg_array[]=$this->TBGToJson($tbg_result);
        }
        
        $special_consolations=  ResultConsolation::getResultByNumber($number)->get();
        
     
        foreach($special_consolations as $special_consolation){

            switch($special_consolation->type){
                case 'special':
                     $array_special[]=array('date'=>$special_consolation->date,'title'=>$special_consolation->title,'number'=>$number);

                    break;
                case 'consolation':
                    $array_consolation[]=array('date'=>$special_consolation->date,'title'=>$special_consolation->title,'number'=>$number);

                    break;
            }
            
        }
        
       
      $response=array('tbgs'=>$tbg_array,'1rs'=>$array_1r,'2rs'=>$array_2r,'3rs'=>$array_3r,'specials'=>$array_special,'consolations'=>$array_consolation);
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        

    }
    
    /**
     *
     * @SWG\Api(
     *   path="/results/getQztReport",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="get qzt Report",
     *       notes="Returns a json",
     *       nickname="getQztReport",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="number",
     *           description="lucky's number",
     *           paramType="form",
     *           required=true,
     *           type="integer"
     *          )
     * 
     *         )
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiGetQztReport()
    {
        $jsonResponse = new JsonResponse();

        $number = Input::get('number');
      

        $top3s=Result::GetQztResultByNumber($number)->get();
        
        $array_1r=array();
        $array_2r=array();
        $array_3r=array();
        $array_special=array();
        $array_consolation=array();
        
        foreach($top3s as $top3){
            
            if (strpos($top3->r1, $number) !== false) {
                    $array_1r[]=array('date'=>$top3->date,'title'=>$top3->title,'number'=>$top3->r1);

                }else if(strpos($top3->r2, $number) !== false) {
                      $array_2r[]=array('date'=>$top3->date,'title'=>$top3->title,'number'=>$top3->r2);

                }else if(strpos($top3->r3, $number) !== false) {
                     $array_3r[]=array('date'=>$top3->date,'title'=>$top3->title,'number'=>$top3->r3);

                }

        }
       
        
        $special_consolations=  ResultConsolation::getQztResultByNumber($number)->get();
        
     
        foreach($special_consolations as $special_consolation){

            switch($special_consolation->type){
                case 'special':
                     $array_special[]=array('date'=>$special_consolation->date,'title'=>$special_consolation->title,'number'=>$special_consolation->value);

                    break;
                case 'consolation':
                    $array_consolation[]=array('date'=>$special_consolation->date,'title'=>$special_consolation->title,'number'=>$special_consolation->value);

                    break;
            }
            
        }
        
       
      $response=array('1rs'=>$array_1r,'2rs'=>$array_2r,'3rs'=>$array_3r,'specials'=>$array_special,'consolations'=>$array_consolation);
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        

    }
    
    /**
     *
     * @SWG\Api(
     *   path="/results/getSudoku",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="get Lucky Number sudoku",
     *       notes="Returns a json",
     *       nickname="getSudoku",
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiGetSudokuResult()
    {
        $jsonResponse = new JsonResponse();

        $sudokuResults=SudokuResult::get();
        
        if(sizeof($sudokuResults)==16){
            
             
             foreach($sudokuResults as $sudokuResult){
                 $result_array[]=$sudokuResult->value;
             }
             
        }else{
            
            $sudoku_date= date('Y-m-d', strtotime("-52 week"));

            $date= ResultDate::GetSudokuDate($sudoku_date)->first();
            $results=Result::getSudokuResultByDateID($date->id)->get();

            $r1="";
            $r2="";
            $r3="";
             $index=0;
             $result_array=array();

         foreach($results as $result){

             if($index==0){
                 $r1=$result->r1;
                 $result_array=str_split($r1);
             }else if($index==1){
                 $r2=$result->r2;
                 $r2_array=str_split($r2);
                 $result_array = array_merge($result_array, $r2_array);
             }else if($index==2){
                 $r3=$result->r3;
                  $r3_array=str_split($r3);
                 $result_array = array_merge($result_array, $r3_array);

                 $r4=$result->r2;
                 $r4_array=str_split($r4);
                 $result_array = array_merge($result_array, $r4_array);
             }
             $index++;

         }
  
        }
       
       
     
       
      $response=array('sudokus'=>$result_array);
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        

    }
        
    
    /**
     *
     * @SWG\Api(
     *   path="/results/listFrequence",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="list Frequence",
     *       notes="Returns a json",
     *       nickname="listFrequence"
     *       )
     *     )
     *   )
     * )
     */ 
    public function apiListFrequence()
    {
        $jsonResponse = new JsonResponse();

       $three_digits=SudokuAnalytics::GetFrequenceThreeDigits()->limit(10)->get();
       
       $three_digits_array=array();
       foreach($three_digits as $three_digit){
           $three_digits_array[]=array('value'=>$three_digit->three_digits,
                                        'count'=> (int) $three_digit->count/2);
       }
       
       $two_digits=SudokuAnalytics::GetFrequenceTwoDigits()->limit(10)->get();
       
       $two_digits_array=array();
       foreach($two_digits as $two_digit){
           $two_digits_array[]=array('value'=>$two_digit->two_digits,
                                        'count'=> (int) $two_digit->count);
       }
       
       
        
     
         $response=array('three_digits'=>$three_digits_array,'two_digits'=>$two_digits_array);
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        

    }
    
    
    /**
     *
     * @SWG\Api(
     *   path="/results/listFaiths",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="list faiths",
     *       notes="Returns a json",
     *       nickname="listFaiths",
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
    public function apiListFaiths()
    {
        $jsonResponse = new JsonResponse();

       
        $page = Input::get('page', 1);
        $pageLength = Input::get('pageLength', 20);
        
        $faithArticles=FaithArticle::GetArticles()->paginate($pageLength);
               $title_array=array();

     
        foreach($faithArticles as $faithArticle){
             $title_array[]=array(
                    'id'=>(int)$faithArticle->id,
                    'link'=>$faithArticle->link,
                    'title'=>$faithArticle->title,
                    'content'=>$faithArticle->content
                );

        }
         $response=array('faiths'=>$title_array);
        $jsonResponse->setResponse($response);

    	return $jsonResponse->get();
        

    }
    
    
  
}