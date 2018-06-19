
<?php

class FaithArticle extends BaseModel{

	protected $table = 'faith_articles';

        
        
        public function scopeGetArticles($query)
	{
		return $query
                             ->where('content','!=','')
                             ->orderBy('id','desc');
	}
}
