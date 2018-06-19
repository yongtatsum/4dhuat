<?php

class JackportBids extends BaseModel{

	protected $table = 'jackport_bids';

     public function phase() 
    {
        return $this->belongsTo('JackportPhase','phase_id');
    }
    
    public function user() 
    {
        return $this->belongsTo('User','created_by');
    }

    public function scopeGetUserbids($query,$phase_id,$userID)
    {
            return $query->select('id')
                         ->where('phase_id',$phase_id)
                         ->where('created_by',$userID);
    }
    
    public function scopeGetPhaseBids($query,$phase_id)
    {
            return $query->select(array('jackport_bids.id','user.name','user.image','jackport_bids.created_on'))
                         ->join('user','user.id','=','jackport_bids.created_by')
                         ->orderBy('jackport_bids.id','desc')   
                         ->where('phase_id',$phase_id);
    }
}
