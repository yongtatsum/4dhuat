<?php



class WebController extends BaseController{

          
  protected $layout = 'layout.bizStore';

  
  public function __construct() {
      
       $platform = Input::get('platform','');
       if($platform=='bizStore'){
                 $this->layout = 'layout.bizStore';
            }
  }
  public function getIndex()
	{
//	
            
        $date_id = Input::get('date_id');
       

        if(empty($date_id)){
             $lastest_date=ResultDate::GetMaxDate()->first();
             $results=Result::getResultByDateID($lastest_date->id)->get();
        }else{
            $lastest_date=ResultDate::find($date_id);
            $results=Result::getResultByDateID($date_id)->get();
        }
        
        
        
        
              
         $my_lucky_num=rand(0000,9999);

                   
                  foreach($results as $result){
                      
                      switch($result->title){
                          case 'DaMaCai 4D':
                                $result_damacai=$this->resultToJson($result);
                              break;
                          case 'Toto 4D':
                              $result_toto=$this->resultToJson($result);
                              break;
                           case 'Magnum 4D':
                              $result_magnum=$this->resultToJson($result);
                              break;
                            case 'Toto 5D':
                              $result_toto_5d=$this->resultToJson($result);
                              break;       
                            case 'Toto 6D':
                              $result_toto_6d=$this->resultToJson($result);
                              break;       
                            case 'Toto POWER 55':
                              $result_toto_55=$this->resultToJson($result);
                              break;  
                           case 'Toto SUPREME 58':
                              $result_toto_58=$this->resultToJson($result);
                              break;  
                            case 'Toto GRAND 63':
                              $result_toto_63=$this->resultToJson($result);
                              break;  
                            case 'CashSweep 4D':
                              $result_cashSweep=$this->resultToJson($result);
                              break;  
                           case 'Sandakan STC 4D':
                              $result_sandakan=$this->resultToJson($result);
                              break; 
                           case 'Sabah Lotto88 4D':
                              $result_lotto=$this->resultToJson($result);
                              break;    
                            case 'Sabah Lotto88 3D':
                              $result_lotto_3d=$this->resultToJson($result);
                              break;   
                          case 'Sabah Lotto88 6/45':
                              $result_lotto_645=$this->resultToJson($result);
                              break; 
                          case 'Singapore 4D':
                              $result_sg=$this->resultToJson($result);
                              break; 
                          case 'Singapore 6/45':
                              $result_sg_645=$this->resultToJson($result);
                              break; 
                          case 'MAGNUM 4D POWERBALL':
                              $result_magnum_powerball=$this->resultToJson($result);
                              break;
                      }

                }
                $this->layout->body = View::make('home.index')
                                    ->with('damacai', isset($result_damacai)?$result_damacai:$this->emptyResultToJson())
                                    ->with('toto', isset($result_toto)?$result_toto:$this->emptyResultToJson())
                                    ->with('magnum', isset($result_magnum)?$result_magnum:$this->emptyResultToJson())
                                    ->with('cashSweep', isset($result_cashSweep)?$result_cashSweep:$this->emptyResultToJson())
                                    ->with('sandakan', isset($result_sandakan)?$result_sandakan:$this->emptyResultToJson())
                                    ->with('lotto', isset($result_lotto)?$result_lotto:$this->emptyResultToJson())
                                    ->with('sg4d', isset($result_sg)?$result_sg:$this->emptyResultToJson())
                                    ->with('sg645', isset($result_sg_645)?$result_sg_645:$this->emptyResultToJson())
                                    ->with('toto_5d', isset($result_toto_5d)?$result_toto_5d:$this->emptyResultToJson())
                                    ->with('toto_6d', isset($result_toto_6d)?$result_toto_6d:$this->emptyResultToJson())
                                    ->with('toto_55', isset($result_toto_55)?$result_toto_55:$this->emptyResultToJson())
                                    ->with('toto_58', isset($result_toto_58)?$result_toto_58:$this->emptyResultToJson())
                                    ->with('toto_63', isset($result_toto_63)?$result_toto_63:$this->emptyResultToJson())
                                    ->with('power_ball', isset($result_magnum_powerball)?$result_magnum_powerball:$this->emptyResultToJson())
                                    ->with('lotto_645', isset($result_lotto_645)?$result_lotto_645:$this->emptyResultToJson())
                                    ->with('lotto_3d', isset($result_lotto_3d)?$result_lotto_3d:$this->emptyResultToJson())
                                    ->with('my_lucky_num',$this->convertNumber($my_lucky_num));


                 
                
                
	}
        
        public function listdates(){
            
            $dates=ResultDate::where('status','active')->orderBy('date','desc')->paginate(40);

            $this->layout->body = View::make('home.dates')
                                    ->with('dates',$dates);
        }
        
        
        public function listSudoku(){
            
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




             $this->layout->body = View::make('home.sudoku')
                                    ->with('numbers',$result_array);
        }
        
        public function myNumber(){
            
            $number = Input::get('number','');
      
            if(empty($number)){
                $number=rand(0000,9999);
            }
           $number=$this->convertNumber($number);

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
           
            $this->layout->body = View::make('home.my_number')
                                  ->with('number',$number)
                                  ->with('first_prizes',$array_1r)
                                  ->with('second_prizes',$array_2r)
                                  ->with('third_prizes',$array_3r)
                                ->with('special_prizes',$array_special)
                                ->with('con_prizes',$array_consolation);
        }
        
    public function analytics(){
            
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
       
       
        
     
            $this->layout->body = View::make('home.analytics')
                                  ->with('three_digits',$three_digits_array)
                                  ->with('two_digits',$two_digits_array);
        }
        
   public function tbg(){
            
         
            $keyword = Input::get('keyword','');
        
          $tbgLists=TbgList::GetResultByKeyword($keyword)->paginate(50);
       
        
        
             
            $this->layout->body = View::make('home.tbg')
                                  ->with('keyword',$keyword)
                                  ->with('tbgs',$tbgLists);
        }     
        
    public function logout(){

        $access_token=Session::get('access_token');
        
        $fb = new Facebook\Facebook([
        'app_id' => FB_APP_ID,
        'app_secret' => FB_APP_SECRET,
        'default_graph_version' => default_graph_version,
        ]);

      $helper = $fb->getRedirectLoginHelper();

      $logoutUrl = $helper->getLogoutUrl($access_token,URL::route('home'));

      
      Auth::logout();
      Session::forget('access_token');

       return Redirect::to($logoutUrl);
    } 

      public function login(){

          $this->layout->body = View::make('home.login');
    }  
    
    public function paymentSuccess(){
        
                    $currentUser=Auth::user();
                    $amount = Input::get('amt','');
                    $payment_status = Input::get('st','');
                    $sig = Input::get('sig','');
                    $txn_id= Input::get('tx','');
                    
                      $order=PaypalPayments::where('txn_id',$txn_id)->first();
                    
                    if(!$order){
                        $order = new PaypalPayments();
                    }
                    
                    $order->txn_id=$txn_id;
                    $order->amount=$amount;
                    $order->sig=$sig;
                    $order->payment_status=$payment_status;
                      
                    $order->full_pdt = json_encode(Input::all());
                    $order->save();
                    
                    $is_sanbox=false;
                    $item_name= $this->verifyPTD($is_sanbox,$txn_id);
                    $order->item_name=$item_name;
                    $order->save();
                    
                    if($currentUser!=null && !empty($order->item_name)){
                        
                    switch($order->item_name){
                        case 'tips.ten.comsumable':
                             $revenue=8;
                            break;
                    }

                     $today=date('Y-m-d H:i:s');
                     DB::beginTransaction();         

                         try {


                         $jackport=  Jackport::getActiveJackport()->first();
                        $jackportPhase=false;
                         if($jackport){
                             $jackportPhase=  JackportPhase::find($jackport->current_phase_id);
                             $phase_id=$jackportPhase->id;
                         }


                             if(!$jackportPhase){

                                  Session::flash('alert', '服務器繁忙，请截图(print screen)后联络我们:'.$order->txn_id); 
                                  return Redirect::to(URL::route('tips'));
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


                             $order->is_claimed='true';
                             $order->save();
                              DB::commit();


                          }catch (\Exception $e) {         

                         Log::error('apiBidJackport: ' . $e->getMessage());

                                     DB::rollback();

                                Session::flash('alert', '服務器繁忙，请截图(print screen)后联络我们:'.$order->txn_id); 
                                return Redirect::to(URL::route('tips'));

                          }
                    }
 
                $jackportBids=JackportBids::GetUserbids($phase_id,$currentUser->id)->orderBy('id','desc')->take($revenue)->get();
                $bid_number_array=array();
                foreach($jackportBids as $jackportBid){
                    $bid_number_array[]=$this->JackportBidToJson($jackportBid);
                }

                try {
                    $this->pushAdminNotification($revenue);
                } catch (Exception $exc) {
        //            echo $exc->getTraceAsString();
                }
                    
              $this->layout->body = View::make('home.payment_success')
                                    ->with('bid_number_array',$bid_number_array);
    }
     public function paymentCancel(){
        

                    
              $this->layout->body = View::make(' home.payment_failed');
    }
    
    public function tips(){
        
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
        
        $jackportBids=array();
        if($current_phase){
            $jackportBids=JackportBids::GetUserbids($current_phase->id,$userID)->paginate(20);
            $other_jackportBids=JackportBids::GetPhaseBids($current_phase->id)->paginate(20);
            
        }

        
            $resultMethod='';
            if(isset($current_phase_array['jackport']) && isset($current_phase_array['jackport']['result_method'])){
                         switch ($current_phase_array['jackport']['result_method']){
                                case "toto_1":
                                    $resultMethod='派完号码后第一期 TOTO 头奖';
                                    break;
                                case "damacai_1":
                                    $resultMethod='派完号码后第一期 Dacamai 头奖';
                                    break;
                                case "magnum_1":
                                    $resultMethod='派完号码后第一期 Magnum 头奖';
                                    break;
                                case "toto_2":
                                    $resultMethod='派完号码后第一期 TOTO 二奖';
                                    break;
                                case "damacai_2":
                                    $resultMethod='派完号码后第一期 Dacamai 二奖';
                                    break;
                                case "magnum_2":
                                    $resultMethod='派完号码后第一期 Magnum 二奖';
                                    break;
                                case "toto_3":
                                    $resultMethod='派完号码后第一期 TOTO 三奖';
                                    break;
                                case "damacai_3":
                                    $resultMethod='派完号码后第一期 Dacamai 三奖';
                                    break;
                                case "magnum_3":
                                    $resultMethod='派完号码后第一期 Magnum 三奖';
                                    break;
                            }
            }

        
            $joined_percentage=round($current_phase_array['current_join']/$current_phase_array['jackport']['require_join'] *100,2);
                    
            $freeNumberLeft=$current_phase_array['jackport']['allow_free']-$current_phase_array['current_redeem'];
            
              $this->layout->body = View::make(' home.tips')
                                        ->with('freeNumberLeft',$freeNumberLeft)
                                        ->with('joined_percentage',$joined_percentage)
                                        ->with('resultMethod',$resultMethod)
                                        ->with('phase',$current_phase_array)
                                        ->with('jackportBids',$jackportBids)
                                        ->with('other_jackportBids',$other_jackportBids);
    }
    
    
    public function redeem_free(){
        
        $currentUser=Auth::user();
        
        
        
        DB::beginTransaction();         

            try {

                $jackport=  Jackport::getActiveJackport()->first();
                if(!$jackport){
                     Session::flash('alert', '服務器繁忙，稍後再試'); 
                     return Redirect::to(URL::route('tips'));
                }
                $jackportPhase=  JackportPhase::find($jackport->current_phase_id);
                
        
                if(!$jackportPhase){

                      Session::flash('alert', '服務器繁忙，稍後再試'); 
                      return Redirect::to(URL::route('tips'));
                }
                $phase_id=$jackportPhase->id;
                if($currentUser->redeem_phase==$phase_id){
            
                        Session::flash('alert', '每位玩家只能获得一个免费号码哦'); 

                        return Redirect::to(URL::route('tips'));


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

                          Session::flash('alert', '服務器繁忙，稍後再試'); 
                          return Redirect::to(URL::route('tips'));

             }
 
        
        
        $jackportBids=JackportBids::GetUserbids($phase_id,$currentUser->id)->orderBy('id','desc')->take(1)->get();
        $bid_number_array=array();
        foreach($jackportBids as $jackportBid){
            $bid_number_array[]=$this->JackportBidToJson($jackportBid);
        }
        
          $this->layout->body = View::make('home.payment_success')
                                ->with('bid_number_array',$bid_number_array);
    }
    

}