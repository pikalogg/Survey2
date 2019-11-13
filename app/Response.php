<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    //
    protected $table = "reponse";

    public function question()
    {
        return $this->hasOne('App\Question');
    }
    public function repondent()
    {
        return $this->belongsTo('App\Respondent');
    }
    public function topicReponse()
    {
        return $this->belongsTo('App\TopicResponse');
    }
}
