
<?php

class SudokuAnalytics extends BaseModel{

	protected $table = 'sudoku_analytics';

	public function scopeGetFrequenceThreeDigits($query)
	{
		return $query->select(array('three_digits','created_on',DB::raw('count(three_digits) as count')))
                            ->groupBy('three_digits')
                            ->orderBy('count','desc')
                            ->orderBy('created_on','desc');
                
                             
	}
        
        public function scopeGetFrequenceTwoDigits($query)
	{
		return $query->select(array('two_digits','created_on',DB::raw('count(two_digits) as count')))
                            ->groupBy('two_digits')
                            ->orderBy('count','desc')
                            ->orderBy('created_on','desc');
                
                             
	}
}
