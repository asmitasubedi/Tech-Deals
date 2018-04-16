@extends('backend.layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Shifts List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <a class="btn btn-block btn-default" href="{{ route('shifts.create')}}"> Add New Shift <span class="glyphicon glyphicon-plus"></span></a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Day</th>
                    <th>Course</th>
                    <th>Shift 1</th>
                    <th>Shift 2</th>
                    <th colspan="2">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($shifts as $shift)
                        <td>{{$shift->id}}</td>
                        <td>{{$shift->courses->course_name}}</td>
                        <td>{{$shift->day}}</td>
                        <td>{{$shift->shift1}}</td>
                        <td>{{$shift->shift2}}</td>
                        <td><a href="/shifts/{{$shift->id}}/edit" class="btn btn-block btn-default"></i>Edit</a></td>
                        <td><form action="/shifts/{{$shift->id}}" method="POST">
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
                    <th>Day</th>
                    <th>Course</th>
                    <th>Shift 1</th>
                    <th>Shift 2</th>
                    <th colspan="2">Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop