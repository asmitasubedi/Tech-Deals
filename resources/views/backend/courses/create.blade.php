@extends('backend.layouts.master')

{{--@section('style')--}}
    {{--<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">--}}
{{--@endsection--}}

@section('content')
    <form role="form" method="post" action="/courses">
        <div class="box-body">
            <!-- Show errors here-->
        @include('backend.layouts.error')
        <!-- Form -->
            {{csrf_field()}}
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter course name">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Category">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="Type">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control" required>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
            </div>
            <div class="form-group">
                <label for="credit_hrs">Credit Hours</label>
                <input type="number" class="form-control" id="credit_hrs" name="credit_hrs">
            </div>
            <div class="form-group">
                <label for="actual_price">Actual Price</label>
                <input type="number" class="form-control" id="actual_price" name="actual_price" oninput="calculate_discount()">
            </div>

            <div class="form-group">
                <label for="discount_percent">Discount Percent</label>
                <input type="number" class="form-control" id="discount_percent" name="discount_percent" oninput="calculate_discount()">
            </div>

            <div class="form-group">
                <label for="discounted_price">Discounted Price</label>
                <input type="number" class="form-control" id="discounted_price" name="discounted_price">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>

            </div>
            <div class="form-group">
                <label for="instructor_id">Select Instructor</label>

                <select name="instructor_id" id="instructor_id" class="form-control" multiple="multiple">
                    @foreach($instructors as $instructor)
                        <option class="form-control" value="{{$instructor->id}}">{{$instructor->instructor_name}}</option>
                    @endforeach
                </select>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('#instructor_id').select2({
                placeholder : 'Please select user',
                tags: true
            });
        });
    </script>

    <script type="text/javascript">
        function calculate_discount(){
            var actualPrice = document.getElementById('actual_price').value;
            var discountPercent = document.getElementById('discount_percent').value;
            var discountedPrice = actualPrice - (discountPercent/100 * actualPrice);
            document.getElementById('discounted_price').value = discountedPrice.toFixed(0);
        }
    </script>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        };
    </script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' , options);
    </script>

@stop