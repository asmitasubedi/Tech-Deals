@extends('frontend.layouts.master')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <h1 class="my-4">Courses</h1>
                @foreach($courses as $course)
                <div class="list-group">
                    <a href="/course/details/{{$course->id}}" class="list-group-item">{{$course->course_name}}</a>
                </div>
                    @endforeach


            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                    <!-- Page Features -->
                    <div class="row text-center">
                        @foreach($courses as $course)
                            <div class="col-lg-4">
                                <div class="card">
                                    <a href="/course/details/{{$course->id}}"> <img class="card-img-top" src="{{$course->courseBanners->course_banner}}" height="250px" width="500px"/></a>
                                    <div class="card-body">
                                        <h4 class="card-title">{{$course->course_name}}</h4>
                                        <p class="card-text">

                                            {{$course->coursedetails->category}} | {{$course->coursedetails->level}} | Rs. {{$course->coursedetails->discounted_price}}
                                        </p>
                                        <p class="card-text">
                                            {!!$course->coursedetails->description!!}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/course/details/{{$course->id}}" class="btn btn-primary">Find Out More!</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>


            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@stop