@extends('backend.layouts.master')

@section('content')
    <form role="form" method="post" action="/shifts/{{$shift->id}}">
        <div class="box-body">
            <!-- Show errors here-->
        @include('backend.layouts.error')
        <!-- Form -->
            {{csrf_field()}}
            <div class="form-group">
                <label for="course_id">Course</label>
                <select name="course_id" id="course_id" class="form-control">
                    @foreach($courses as $course)
                        <option class="form-control" value="{{$course->id}}"
                                @if ($shift->courses->course_name == $course->course_name) selected="selected" @endif>
                            {{$course->course_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="day">Day</label>
                <input type="text" class="form-control" id="day" name="day" value="{{$shift->day}}">
            </div>
            <div class="form-group">
                <label for="shift1">Shift 1</label>
                <input type="text" class="form-control" id="shift1" name="shift1" value="{{$shift->shift1}}">
            </div>
            <div class="form-group">
                <label for="shift2">Shift 2</label>
                <input type="text" class="form-control" id="shift2" name="shift2" value="{{$shift->shift2}}">
            </div>
            <input type="hidden" name="_method" value="PUT">
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@stop