@extends('backend.layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Instructors List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <a class="btn btn-block btn-default" href="{{ route('instructors.create')}}"> Add New Instructor <span class="glyphicon glyphicon-plus"></span></a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Instructors Name</th>
                    <th>Photo</th>
                    <th>Course</th>
                    <th>Description</th>
                    <th colspan="2">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($instructors as $instructor)
                        <td>{{$instructor->id}}</td>
                        <td>{{$instructor->instructor_name}}</td>
                        <td><img src="{{$instructor->photo}}" height="200" width="200"></td>
                        <td>{{$instructor->courses->course_name}}</td>
                        <td>{{$instructor->description}}</td>
                        <td><a href="/instructors/{{$instructor->id}}/edit" class="btn btn-block btn-default"></i>Edit</a></td>
                        <td><form action="/instructors/{{$instructor->id}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="Delete" class="btn btn-block btn-danger" onclick="return  confirm('Are you sure you want to delete this entry?')">
                            </form></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>S.No.</th>
                    <th>Instructors Name</th>
                    <th>Course</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th colspan="2">Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop