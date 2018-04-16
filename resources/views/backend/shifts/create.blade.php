@extends('backend.layouts.master')

@section('content')
    <form role="form" method="post" action="/shifts">
        <div class="box-body">
            <!-- Show errors here-->
        @include('backend.layouts.error')
        <!-- Form -->
            {{csrf_field()}}
            <div class="form-group">
                <label for="course_id">Course</label>
                <select name="course_id" id="course_id" class="form-control">
                    @foreach($courses as $course)
                        <option class="form-control" value="{{$course->id}}">{{$course->course_name}}
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="day">Day</label>
                <input type="text" class="form-control" id="day" name="day">
            </div>
            <div class="form-group">
                <label for="shift1">Shift 1</label>
                <input type="text" class="form-control" id="shift1" name="shift1">
            </div>
            <div class="form-group">
                <label for="shift2">Shift 2</label>
                <input type="text" class="form-control" id="shift2" name="shift2">
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@stop