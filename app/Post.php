<?php

namespace App;
use Carbon\Carbon;

class Post extends Model
{
    // protected $fillable = ['title', 'body'];
    // protected $guarded = ['user_id']; //except everything will be allowed except user_id

	function comments()
	{
		// return $this->hasMany('App\Comment');
		return $this->hasMany(Comment::class); // use this prefered
	}

	function user()
	{
		return $this->belongsTo(User::class);
	}

	function addComment($body,$user_id)
	{
		$this->comments()->create(compact('body','user_id'));
	}

	public function scopeFilter($query, $filters)
	{
		if ($month = $filters['month']) {

			$query->whereMonth('created_at', Carbon::parse($month)->month);
		}

		if ($year = $filters['year']) {

			$query->whereYear('created_at', $year);
		}

	}

	public static function archives()
	{
		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
		->groupBy('year', 'month')
		->orderByRaw('min(created_at) desc')
		->get()
		->toArray();
	}

	function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

}
