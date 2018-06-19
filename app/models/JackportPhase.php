<?php

class JackportPhase extends BaseModel{

	protected $table = 'jackport_phase';

    public function winner() 
    {
        return $this->belongsTo('User','winner_id');
    }
    
    public function jackport() 
    {
        return $this->belongsTo('Jackport','jackport_id');
    }
    
    public function scopeGetNextRound($query,$jackport_id)
    {
            return $query->where('jackport_id',$jackport_id)
                         ->where('status','active');
    }
    
      public function scopeGetPassedJackport($query)
	{
		return $query->where('status','waiting')
                             ->orWhere('status','expired')
                             ->orderBy('created_on','desc');
	}
    
    
}
