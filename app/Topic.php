<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $table = "topic";

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function question()
    {
        return $this->hasMany('App\Question');
    }
    public function topicReponses()
    {
        return $this->hasMany('App\TopicResponse');
    }
}
