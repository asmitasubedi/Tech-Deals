<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class CourseDetail extends Model
{

    protected $guarded =[];

    public function courses()
    {
        return $this->belongsTo('App\Course','course_id');
    }
}
