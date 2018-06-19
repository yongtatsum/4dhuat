
<?php

class Result extends BaseModel{

	protected $table = 'result';

         public function specials()
	{
		return $this->hasMany('ResultConsolation','result_id')->where('type','special');
	}
         public function consolations()
	{
		return $this->hasMany('ResultConsolation','result_id')->where('type','consolation');
	}
        
        public function scopeGetResultByDateID($query,$date_id)
	{
		return $query->where('date_id',$date_id);
	}
        
        public function scopeGetResultByNumber($query,$number)
	{
		return $query->where('r1',$number)
                             ->orWhere('r2',$number)
                             ->orWhere('r3',$number)
                            ->groupBy('result.date');
	}
        
         public function scopeGetQztResultByNumber($query,$number)
	{
		return $query->where('r1','like', "%$number%")
                             ->orWhere('r2','like', "%$number%")
                             ->orWhere('r3','like', "%$number%")
                             ->orderBy('date_id','desc')   
                            ->groupBy('result.date');
	}
        
         public function scopeGetSudokuResultByDateID($query,$date_id)
	{
		return $query->where('date_id','>=',$date_id)
                             ->where(function($query){
                                $query
                                    ->where('title','DaMaCai 4D')
                                    ->orwhere('title','Toto 4D')
                                    ->orwhere('title','Magnum 4D');
                                });
	}
        
        public function scopeGetSudokuAnalytic($query)
	{
		return $query
                             ->where(function($query){
                                $query
                                    ->where('title','DaMaCai 4D')
                                    ->orwhere('title','Toto 4D')
                                    ->orwhere('title','Magnum 4D');
                                })
                                ->orderBy('id','desc');
	}
}
