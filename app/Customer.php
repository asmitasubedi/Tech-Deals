<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function enrolledCourses()
    {
        return $this->hasMany('App\EnrolledCourse','customer_id');
    }
}
