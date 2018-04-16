<?php

namespace App;
use App\Course;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $guarded =[];

    public function courses()
    {
        return $this->belongsTo('App\Course','course_id');
    }
}
