<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = ['code'];

    public function degree(){

        return $this->belongsTo('App\Degree','degree_id');
    }
}
