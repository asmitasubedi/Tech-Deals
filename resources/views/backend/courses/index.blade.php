@extends('backend.layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Courses List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="box">
                <a class="btn btn-block btn-default" href="{{ route('courses.create')}}"> Add New Course <span class="glyphicon glyphicon-plus"></span></a>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if ($message = Session::get('warning'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif

             <table id="list_courses" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Course Name</th>
                    {{--<th>Created At</th>--}}
                    {{--<th>Updated At</th>--}}
                    {{--<th>S.No.</th>--}}
                    {{--<th>Course Name</th>--}}
                    <th>Category</th>
                    <th>Type</th>
                    <th>Level</th>
                    <th>Credit Hours</th>
                    <th>Actual Price</th>
                    <th>Discounted Price</th>
                    <th>Discount %</th>
                    <th>Description</th>
                    <th>Actions</th>
                    {{--<th>Delete</th>--}}
                </tr>
                </thead>
                {{--<tbody>--}}
                {{--<tr>--}}
                    {{--@foreach($courses as $course)--}}
                        {{--<td>{{$course->id}}</td>--}}
                        {{--<td>{{$course->course_name}}</td>--}}
                        {{--<td>{{$course->coursedetails->category}}</td>--}}
                        {{--<td>{{$course->coursedetails->type}}</td>--}}
                        {{--<td>{{$course->coursedetails->level}}</td>--}}
                        {{--<td>{{$course->coursedetails->credit_hrs}}</td>--}}
                        {{--<td>{{$course->coursedetails->actual_price}}</td>--}}
                        {{--<td>{{$course->coursedetails->discounted_price}}</td>--}}
                        {{--<td>{{$course->coursedetails->discount_percent}}</td>--}}
                        {{--<td>{!! $course->coursedetails->description !!}</td>--}}
                        {{--<td><a href="/courses/{{$course->id}}/edit" class="btn btn-block btn-default"></i>Edit</a>--}}
                        {{--<form action="/courses/{{$course->id}}" method="POST">--}}
                                {{--{{csrf_field()}}--}}
                                {{--<input type="hidden" name="_method" value="DELETE">--}}
                                {{--<input type="submit" value="Delete" class="btn btn-block btn-danger" onclick="return  confirm('Are you sure you want to delete this entry?')">--}}
                        {{--</form></td>--}}
                {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
                {{--<tfoot>--}}
                {{--<tr>--}}
                    {{--<th>S.No.</th>--}}
                    {{--<th>Course Name</th>--}}
                    {{--<th>Category</th>--}}
                    {{--<th>Type</th>--}}
                    {{--<th>Level</th>--}}
                    {{--<th>Credit Hours</th>--}}
                    {{--<th>Actual Price</th>--}}
                    {{--<th>Discounted Price</th>--}}
                    {{--<th>Discount %</th>--}}
                    {{--<th>Description</th>--}}
                    {{--<th>Actions</th>--}}
                    {{--<th>Delete</th>--}}
                {{--</tr>--}}
                {{--</tfoot>--}}
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#list_courses').DataTable({
                order: [[0, "desc"]],
                processing: true,
                serverSide: true,
                ajax: '{{ route('get_dataTable') }}',
                columns: [
                    {data: 'id', name: 'courses.id'},
                    {data: 'course_name', name: 'courses.course_name'},
                    {data: 'category', name:'course_details.category'},
                    {data: 'type', name: 'course_details.type'},
                    {data: 'level', name: 'course_details.level'},
                    {data: 'credit_hrs', name: 'course_details.credit_hrs'},
                    {data: 'actual_price', name: 'course_details.actual_price'},
                    {data: 'discounted_price', name: 'course_details.discounted_price'},
                    {data: 'discount_percent', name: 'course_details.discount_percent'},
                    {data:'description', name:'course_details.description'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
//                    {data: 'delete', name: 'delete', orderable: false, searchable: false}

                ]
            })
        });
    </script>

   @stop