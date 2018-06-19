
<?php

class ResultConsolation extends BaseModel{

	protected $table = 'result_consolation';

         public function scopeGetResultByNumber($query,$number)
	{
		return $query
                 ->select('result.date','result_consolation.value','result_consolation.type','result.title')
                 ->join('result','result.id','=','result_consolation.result_id')
                 ->groupBy('result.date')
                 ->where('value',$number);
	}
        
        public function scopeGetQztResultByNumber($query,$number)
	{
		return $query
                 ->select('result.date','result_consolation.value','result_consolation.type','result.title')
                 ->join('result','result.id','=','result_consolation.result_id')
                 ->groupBy('result.date')
                 ->orderBy('result.date','desc')
                 ->where('value','like', "%$number%");
	}
         
}
