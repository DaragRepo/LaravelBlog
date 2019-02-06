<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // public static function incomplete()
    // {
    // 	return static::where('completed',0)->get();
    // } 
     public function scopeIncomplete($query) // if you need to pass anything do it like this scopeIncomplete($query, $val)
    {
    	return $query->where('completed',0);
    }
}
