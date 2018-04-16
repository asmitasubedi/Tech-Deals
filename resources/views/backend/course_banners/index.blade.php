@extends('backend.layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Courses Banner List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <a class="btn btn-block btn-default" href="{{ route('course_banners.create')}}"> Add New Course Banner <span class="glyphicon glyphicon-plus"></span></a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Course</th>
                    <th>Course Banner</th>
                    <th colspan="2">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($course_banners as $course_banner)
                        <td>{{$course_banner->id}}</td>
                        <td>{{$course_banner->courses->course_name}}</td>
                        <td><img src="{{$course_banner->course_banner}}" height="200" width="200"></td>
                        <td><a href="/course_banners/{{$course_banner->id}}/edit" class="btn btn-block btn-default"></i>Edit</a></td>
                        <td><form action="/course_banners/{{$course_banner->id}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="Delete" class="btn btn-block btn-danger">
                            </form></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>S.No.</th>
                    <th>Course</th>
                    <th>Course Banner</th>
                    <th colspan="2">Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop