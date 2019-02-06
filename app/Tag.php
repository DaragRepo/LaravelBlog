<?php

namespace App;


class Tag extends Model
{
	function posts()
	{
		return $this->belongsToMany(Post::class);	
	}   

	function getRouteKeyName()
	{
		// perform a where condition on the name 
		return 'name';
	}
}
