@extends('backend.layouts.master')

@section('content')
    <form role="form" method="post" action="/course_banners/{{$courseBanner->id}}" enctype='multipart/form-data'>
        <div class="box-body">
            <!-- Show errors here-->
        @include('backend.layouts.error')
        <!-- Form -->
            {{csrf_field()}}
            <div class="form-group">
                <label for="course_id">Course</label>

                <select name="course_id" id="course_id" class="form-control">
                    @foreach($courses as $course)
                        <option value="{{$course->id}}"
                                @if ($courseBanner->courses->course_name == $course->course_name) selected="selected" @endif>
                            {{$course->course_name}}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="course_banner">Course Banner</label>
                <span class="input-group-btn">
                 <a id="lfm" data-input="course_banner" data-preview="banner_holder" class="btn btn-primary">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
                <input id="course_banner" class="form-control" type="text" name="course_banner" value="{{$courseBanner->course_banner}}">
            </div>
            <img id="banner_holder" style="margin-top:15px;max-height:100px;">
            <input type="hidden" name="_method" value="PUT">
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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