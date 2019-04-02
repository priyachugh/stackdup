<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	protected $fillable = ['body', 'user_id'];
    public function question($value='')
    {
    	return $this->belongsTo(Question::class);
    }

    public function user($value='')
    {
    	return $this->belongsTo(User::class);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public static function boot() {
	    	parent::boot();
	    	static::created(function($answer) {
	    	$answer->question->increment('answers_count');
	    });

            static::deleted(function($answer) {
            $answer->question->decrement('answers_count');
        });
    }
}
