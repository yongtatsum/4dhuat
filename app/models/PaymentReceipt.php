<?php

class PaymentReceipt extends BaseModel{

	protected $table = 'payment_receipt';

    public function user() 
    {
        return $this->belongsTo('User','created_by');
    }
    
   
     public function scopeGetExistingClaimedReciept($query,$puchase_token,$SKU)
	{
		return $query->where('is_claimed','true')
                             ->where('SKU',$SKU)
                             ->where('purchase_token',$puchase_token);
	}

    
}
