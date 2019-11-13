<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    //
    protected $table = "respondent";

    public function response()
    {
        return $this->hasMany('App\Response');
    }
    public function topicResponse()
    {
        return $this->belongsTo('App\TopicResponse');
    }
}
