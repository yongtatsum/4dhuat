<?php
//file app/model/BaseModel.php
class BaseModel extends Eloquent{
    
    public $timestamps = false;

    public static function boot()
    {

        parent::boot();

        static::creating(function($model) {
            $user = Auth::user();
            $model->created_on = date('Y-m-d H:i:s');
            if(!empty($user))
            $model->created_by = $user->id;
        });

        static::updating(function($model) {
            $user = Auth::user();
            $model->modified_on = date('Y-m-d H:i:s');
            $model->modified_by = !empty($user) ? $user->id : null;
        });        
    }
    
}
