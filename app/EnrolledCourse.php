<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrolledCourse extends Model
{
    protected $guarded =[];

    public function courses()
    {
        return $this->belongsTo('App\Course','course_id');
    }

    public function customers()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}
