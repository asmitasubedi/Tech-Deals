@extends('backend.layouts.master')

@section('content')

    <form role="form" method="post" action="/courses/{{$course->id}}">
        <div class="box-body">
            <!-- Show errors here-->
        @include('backend.layouts.error')
        <!-- Form -->
            {{csrf_field()}}
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name" value="{{$course->course_name}}" placeholder="Enter course name">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{$course->coursedetails->category}}" placeholder="Category">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" id="type" name="type" value="{{$course->coursedetails->type}}" placeholder="Type">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control">
                    <option value="Beginner" @if($course->coursedetails->level =='Beginner') selected="selected" @endif>Beginner</option>
                    <option value="Intermediate" @if($course->coursedetails->level =='Intermediate') selected="selected" @endif>Intermediate</option>
                    <option value="Advanced" @if($course->coursedetails->level =='Advanced') selected="selected" @endif>Advanced</option>
                </select>
            </div>
            <div class="form-group">
                <label for="credit_hrs">Credit Hours</label>
                <input type="number" class="form-control" id="credit_hrs" name="credit_hrs" value="{{$course->coursedetails->credit_hrs}}">
            </div>
            <div class="form-group">
                <label for="actual_price">Actual Price</label>
                <input type="number" class="form-control" id="actual_price" name="actual_price" value="{{$course->coursedetails->actual_price}}" oninput="calculate_discount()">
            </div>

            <div class="form-group">
                <label for="discount_percent">Discount Percent</label>
                <input type="number" class="form-control" id="discount_percent" name="discount_percent" value="{{$course->coursedetails->discount_percent}}" oninput="calculate_discount()">
            </div>
            <div class="form-group">
                <label for="discounted_price">Discounted Price</label>
                <input type="number" class="form-control" id="discounted_price" name="discounted_price" value="{{$course->coursedetails->discounted_price}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" value="{{$course->coursedetails->description}}">{{$course->coursedetails->description}}</textarea>
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

    <script type="text/javascript">
        function calculate_discount(){
            var actualPrice = document.getElementById('actual_price').value;
            var discountPercent = document.getElementById('discount_percent').value;
            var discountedPrice = actualPrice - (discountPercent/100 * actualPrice);
            document.getElementById('discounted_price').value = discountedPrice.toFixed(0);
        }
    </script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@stop