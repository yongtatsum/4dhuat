
<?php

class TbgList extends BaseModel{

	protected $table = 'tgb_list';

       

        
         public function scopeGetSimilarResultByNumber($query,$number1,$number2)
	{
		return $query->where('type','tpk')
                            ->where(function($query) use ($number1,$number2){
                                $query
                                     ->where('number', 'like', "%$number1%")
                                    ->orWhere('number', 'like', "%$number2%");
                                });
                
                             
	}
        
        public function scopeGetResultByKeyword($query,$keyword)
	{
            
             $query->where('type','tpk');
            if(!empty($keyword)){
                $query->where(function($query) use ($keyword){
                                $query
                                     ->where('number', 'like', "%$keyword%")
                                    ->orWhere('name', 'like', "%$keyword%")
                                    ->orWhere('name_cn', 'like', "%$keyword%");
                                });
            }
		
               return  $query;
                             
	}
}
