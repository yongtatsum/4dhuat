<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;


class User extends BaseModel implements UserInterface {

	use UserTrait;
	
	protected $table = 'user';

	protected $hidden = array('password');

        
	
   
	public function scopeGetByEmail($query, $email)
	{
		return $query
		->where('email', $email)
		->where('status', '=', 'active')
		;
	}
        
        public function scopeGetById($query, $userID)
	{
		return $query
		->where('id', $userID)
		;
	}
        
                public function scopeGetAllAndroidUser($query)
	{
		return $query
                 ->select(array('user.android'))
                 ->where('status','active')
                 ->where('user.android','!=','');
                
//                echo $query->toSql();
//                exit;

	} 
        
}
