@extends('backend.layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of Enrolled Courses</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Customer</th>
                    <th>Course</th>
                    <th>Enrolled Date</th>
                    <th>Coupon Code</th>
                    <th>Course Enroll Status</th>
                    <th colspan="2">Actions</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    @foreach($enrolled_courses as $enrolled_course)
                        <form action="/enrolled_courses/{{$enrolled_course->id}}" method="POST">
                            <div class="token">{{csrf_field()}}</div>
                            <td>{{$enrolled_course->id}}</td>
                            <td><a href="/customers/{{$enrolled_course->customers->id}}">{{$enrolled_course->customers->user_name}}</a></td>
                            <td><a href="/courses/{{$enrolled_course->courses->id}}">{{$enrolled_course->courses->course_name}}</a></td>
                            <td>{{$enrolled_course->created_at->toFormattedDateString()}}</td>
                            <td>{{$enrolled_course->coupon_code}}</td>
                            <td>

                                <select id="course_enroll_status" name="course_enroll_status">
                                    <option id="course_enroll_status" value="Not Started" name="course_enroll_status" {{$enrolled_course->course_enroll_status == "Not Started"? 'selected="selected"':'' }} >Not Started</option>
                                    <option id="course_enroll_status" value="Started" name="course_enroll_status" {{$enrolled_course->course_enroll_status == "Started"? 'selected="selected"':'' }}>Started</option>
                                    <option id="course_enroll_status" value="Completed" name="course_enroll_status" {{$enrolled_course->course_enroll_status == "Completed"? 'selected="selected"':'' }}>Completed</option>

                                </select>

                            </td>
                            <td>
                                <input type="hidden" name="_method" value="PUT">
                                <input type="submit" value="Update" id="status-update" class="btn btn-block btn-submit">
                        </form></td>
                        {{--  <td><a href="/courses_enrolled/{{$enroll->id}}/edit" class="btn btn-block btn-default"></i>Update</a></td>  --}}
                        <td><form action="/enrolled_courses/{{$enrolled_course->id}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="Delete" class="btn btn-block btn-danger">
                            </form></td>
                </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>S.No.</th>
                    <th>Customer</th>
                    <th>Course</th>
                    <th>Enrolled Date</th>
                    <th>Coupon Code</th>
                    <th>Course Enroll Status</th>
                    <th colspan="2">Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
@stop

@section('js')
    <script type="text/javascript">
        $("#status-update").click(function(e){
            e.preventDefault();
            var form_action = $(".box-body").find("form").attr("action");
//                      var course_enroll_status = $("input[name=course_enroll_status]").val();
            var course_enroll_status = $("#course_enroll_status").val();
            alert(course_enroll_status);

$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                dataType: 'json',
                type:'PUT',
                url: form_action,
                data: {course_enroll_status: course_enroll_status},
                success:function(data){
                    console.log(data)
                }
            });

        });
    </script>
@stop