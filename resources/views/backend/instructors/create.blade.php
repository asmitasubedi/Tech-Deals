@extends('backend.layouts.master')

@section('content')
    <form role="form" method="post" action="/instructors" enctype='multipart/form-data'>
        <div class="box-body">
            <!-- Show errors here-->
        @include('backend.layouts.error')
        <!-- Form -->
            {{csrf_field()}}
            <div class="form-group">
                <label for="product_name">Instructors Name</label>
                <input type="text" class="form-control" id="instructor_name" name="instructor_name" placeholder="Enter instructor's name">
            </div>
            <div class="form-group">
                <label for="course_id">Course</label>

                <select name="course_id" id="course_id" class="form-control">
                    @foreach($courses as $course)
                        <option class="form-control" value="{{$course->id}}">{{$course->course_name}}
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
                <input id="photo" class="form-control" type="text" name="photo">
            </div>
            <img id="holder" style="margin-top:15px;max-height:100px;">

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
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