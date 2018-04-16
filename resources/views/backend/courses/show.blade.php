@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="box">
            <div class="box-body">

                <h3>{{$course->course_name}}</h3>
                <img src="{{$course->courseBanners->course_banner}}"height="400" width="400">
                <p>
                    <b>Category:</b> {{$course->coursedetails->category}}
                    <br/>
                    <b>Type: </b>{{$course->coursedetails->type}}
                    <br/>
                    <b>Level: </b>{{$course->coursedetails->level}}
                    <br/>
                    <b>Credit Hours: </b>{{$course->coursedetails->credit_hrs}}
                    <br/>
                    <b>Actual Price: </b>{{$course->coursedetails->actual_price}}
                    <br/>
                    <b>Discounted Price: </b>{{$course->coursedetails->discounted_price}}
                    <br/>
                    <b> Discount Percent: </b> {{$course->coursedetails->discount_percent}}
                    <br/>
                    <b>Course Description:</b> {!!$course->coursedetails->description!!}
                    <br/>
                    <a href="/enrolled_courses" class="btn btn-default">Back</a>
                </p>
            </div>

        </div>
    </div>

@stop