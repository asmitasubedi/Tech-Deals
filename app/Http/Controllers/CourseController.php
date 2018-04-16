<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseDetail;
use App\Instructor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['lists','details']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();
        return view ('backend.courses.index', compact('courses'));
    }

    public function get_dataTable(Request $request)
    {

        $courses = Course::join('course_details', 'courses.id', '=', 'course_details.course_id')
            ->select(['courses.id', 'courses.course_name',
                'course_details.category', 'course_details.type','course_details.level','course_details.credit_hrs',
                'course_details.actual_price', 'course_details.discounted_price', 'course_details.discount_percent','course_details.description']);

        return Datatables::of($courses)
            ->editColumn('description', '{!! str_limit($description, 10) !!}')
            ->addColumn('action', function ($course) {
                return '<a href="/courses/'.$course->id.'/edit" class="btn btn-block btn-default"></i>Edit</a>
                <form action="/courses/'.$course->id.'" method="POST">
                                '.csrf_field().'
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="Delete" class="btn btn-block btn-danger" onclick="return  confirm(\'Are you sure you want to delete this entry?\')">
                        </form>';
            })
            ->make();
//        return Datatables::of($courses)->make();

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instructors = Instructor::all();
        return view ('backend.courses.create', compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'course_name' => 'required',
            'category' => 'required',
            'type' => 'required',
            'level' => 'required',
            'credit_hrs' => 'required',
            'actual_price' => 'required',
            'discounted_price' => 'required',
            'discount_percent' => 'required',
            'description' => 'required',
            ]);

        $course=Course::create([
            'course_name' =>$request['course_name']
        ]);

        $course->coursedetails()->create([
            'category' => $request['category'],
            'type' => $request['type'],
            'level' => $request['level'],
            'credit_hrs' => $request['credit_hrs'],
            'actual_price' => $request['actual_price'],
            'discounted_price' => $request['actual_price'],
            'discount_percent' => $request['discount_percent'],
            'description' => $request['description'],
        ]);

        return redirect('/courses')->with('success','Course created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function lists()
    {
        $courses = Course::latest()->get();
        return view('frontend.courses.index',compact('courses'));
    }

    public function details(Course $course)
    {
        return view('frontend.courses.show',compact('course'));
    }

    public function show(Course $course)
    {
        return view('backend.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('backend.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        request()->validate([
            'course_name' => 'required',
            'category' => 'required',
            'type' => 'required',
            'level' => 'required',
            'credit_hrs' => 'required',
            'actual_price' => 'required',
            'discounted_price' => 'required',
            'discount_percent' => 'required',
            'description' => 'required',
        ]);

        $course->update([
            'course_name' =>$request['course_name']
        ]);

        $course->coursedetails()->update([
            'category' => $request['category'],
            'type' => $request['type'],
            'level' => $request['level'],
            'credit_hrs' => $request['credit_hrs'],
            'actual_price' => $request['actual_price'],
            'discounted_price' => $request['actual_price'],
            'discount_percent' => $request['discount_percent'],
            'description' => $request['description'],
        ]);

        return redirect('/courses')->with('success','Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        try {
            $course->delete();
            $course->coursedetails()->delete();
            return redirect('/courses')->with('success','Course deleted successfully');
        }
        catch (\Illuminate\Database\QueryException $e) {
            return redirect('/courses')->with('warning','Course can not be deleted. Foreign Constraint Violation.');
        }
    }
}
