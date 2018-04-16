<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class CourseBanner extends Model
{
    protected $guarded =[];

    public function courses()
    {
        return $this->belongsTo('App\Course','course_id');
    }

}

