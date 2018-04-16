@extends('frontend.layouts.master')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <h1 class="my-4">{{$course->course_name}}

        </h1>

        <!-- Portfolio Item Row -->
        <div class="row">

            {{--Course Banner--}}
            <div class="col-md-8">
                <img class="img-fluid" src="{{$course->courseBanners->course_banner}}" alt="courseBanner">
            </div>

            {{--Course Enroll Form--}}
            <div class="col-md-4">
                <h3 class="my-4">Register Now!!</h3>
                <form>
                    @include('frontend.layouts.error')
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="user_name">Name</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your email address">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address (address and city)">
                    </div>
                    <div class="form-group">
                        <label for="address">Phone No.</label>
                        <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Enter your phone number (9813XXXXXX or 01-44XXXXX)">
                    </div>
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <button class="btn btn-success btn-submit">Enroll Now </button>
                </form>

            </div>

        </div>
        <!-- /.row -->

        <!-- Portfolio Description Item Row -->
        <div class="row">

            <div class="col-md-4">

                <h3 class="my-3">Course Details</h3>
                <ul>
                    <li>Type: {{$course->coursedetails->type}}</li>
                    <li>Level: {{$course->coursedetails->level}}</li>
                    <li>Credit Hours: {{$course->coursedetails->credit_hrs}}</li>
                    <li>Price: <strike>Rs. {{$course->coursedetails->actual_price}}</strike> Rs. {{$course->coursedetails->discounted_price}}</li>
                </ul>

                <h3 class="my-3">Course Description</h3>
                <p>{!! $course->coursedetails->description !!}</p>

            </div>

            <div class="col-md-4">

                <h3 class="my-3">Instructors</h3>
                @foreach($course->instructors as $instructor)

                    <img class="img-fluid" src="{{$instructor->photo}}" alt="courseBanner">
                    <p>{{$instructor->instructor_name}}</p>

                    @endforeach


                <h3 class="my-3">Shifts</h3>
                <p>{{$course->shifts->day}}</p>
                <p>{{$course->shifts->shift1}}</p>
                <p>{{$course->shifts->shift2}}</p>

            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <h3 class="my-4">Related Projects</h3>

        <div class="row">

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    {{--<script src="{{asset('js/enroll-now.js')}}"></script>--}}
@stop

