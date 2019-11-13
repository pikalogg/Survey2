<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseChoice extends Model
{
    //
    protected $table = "reponse_choice";

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
