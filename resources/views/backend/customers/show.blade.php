@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="box">
            <div class="box-body">

                <h3>{{$customer->user_name}}</h3>
                <p>
                    <b>Email:</b> {{$customer->email}}
                    <br/>
                    <b>Address: </b>{{$customer->address}}
                    <br/>
                    <b>Phone no: </b>{{$customer->phone_no}}
                    <br/>
                    <b> Enrolled Courses: </b>
                <ul>
                    @foreach($customer->enrolledCourses as $enrolled)
                        <li>{{$enrolled->courses->course_name}}</li>

                    @endforeach
                </ul>
                <a href="/enrolled_courses" class="btn btn-default">Back</a>
                </p>
            </div>

        </div>
    </div>

@stop