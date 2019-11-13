<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicResponse extends Model
{
    //
    protected $table = "topic_response";

    public function topic()
    {
        return $this->hasOne('App\Topic');
    }
    public function reponse()
    {
        return $this->hasMany('App\Response');
    }
    public function respondent()
    {
        return $this->belongsTo('App\Respondent');
    }
}
