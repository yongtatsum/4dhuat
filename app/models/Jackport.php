<?php

class Jackport extends BaseModel{

	protected $table = 'jackport';

        public function current_phase() 
    {
        return $this->belongsTo('JackportPhase','current_phase_id');
    }
        
          public function scopeGetActiveJackport($query)
	{
		return $query->where('status','active');
	}
        
       

}
