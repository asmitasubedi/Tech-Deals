@extends('backend.layouts.master')

@section('content')
    <form role="form" method="post" action="/instructors/{{$instructor->id}}" enctype='multipart/form-data'>
        <div class="box-body">
            <!-- Show errors here-->
        @include('backend.layouts.error')
        <!-- Form -->
            {{csrf_field()}}
            <div class="form-group">
                <label for="product_name">Instructors Name</label>
                <input type="text" class="form-control" id="instructor_name" name="instructor_name" value="{{$instructor->instructor_name}}">
            </div>
            <div class="form-group">
                <label for="course_id">Course</label>
                    <select name="course_id" id="course_id" class="form-control">
                        @foreach($courses as $course)
                            <option  value="{{$course->id}}"
                                    @if ($instructor->courses->course_name == $course->course_name) selected="selected" @endif>
                                {{$course->course_name}}</option>
                        @endforeach
                    </select>
             </div>
            <div class="form-group">
                <label for="photo">Instructor's Photo</label>
                <span class="input-group-btn">
                 <a id="lfm" data-input="photo" data-preview="holder" class="btn btn-primary">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
                <input id="photo" class="form-control" type="text" name="photo" value="{{$instructor->photo}}">
            </div>
            <img id="holder" style="margin-top:15px;max-height:100px;">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" value="{{$instructor->description}}">{{$instructor->description}}</textarea>
            </div>
            <input type="hidden" name="_method" value="PUT">
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@stop

@section('js')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@stop