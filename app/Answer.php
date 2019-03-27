<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question($value='')
    {
    	return $this->belongsTo(Question::class);
    }

    public function user($value='')
    {
    	return $this->belongsTo(User::class);
    }
}
