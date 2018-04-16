<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded =[];

    public function instructors()
    {
        return $this->hasMany('App\Instructor','course_id');
    }

    public function coursedetails()
    {
        return $this->hasOne('App\CourseDetail','course_id');
    }

    public function shifts()
    {
        return $this->hasOne('App\Shift','course_id');
    }

    public function courseBanners(){
        return $this->hasOne('App\CourseBanner', 'course_id');
    }

    public function enrolledCustomers(){
        return $this->hasMany('App\EnrolledCourse', 'course_id');
    }

}
