<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = "questions";

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
    public function questionType()
    {
        return $this->hasOne('App\QuestionType');
    }
    public function responseChoice()
    {
        return $this->hasMany('App\ResponseChoice');
    }
    public function reponse()
    {
        return $this->belongsToMany('App\Response');
    }
}
