
<?php

class ResultDate extends BaseModel{

	protected $table = 'result_date';

        
        public function scopeGetMaxDate($query)
	{
		return $query->where('status','active')->orderBy('date','desc');
	}
        
        public function scopeGetSudokuDate($query,$date)
	{
		return $query->where('date','>',$date);
	}
}
