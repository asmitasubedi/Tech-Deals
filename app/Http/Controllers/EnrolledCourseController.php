<?php

namespace App\Http\Controllers;

use App\EnrolledCourse;
use Illuminate\Http\Request;

class EnrolledCourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolled_courses = EnrolledCourse::latest()->get();
        return view('backend.enrolled_courses.index', compact ('enrolled_courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EnrolledCourse  $enrolledCourse
     * @return \Illuminate\Http\Response
     */
    public function show(EnrolledCourse $enrolledCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EnrolledCourse  $enrolledCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(EnrolledCourse $enrolledCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EnrolledCourse  $enrolledCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnrolledCourse $enrolledCourse)
    {
        $enrolledCourse->update([
            'course_enroll_status' => $request['course_enroll_status']
        ]);

//        return response()->json($enrolledCourse);
        return redirect('/enrolled_courses')->with('success','Enrolled Course Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EnrolledCourse  $enrolledCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enroll = EnrolledCourse::find($id);
        $enroll->delete();
        return redirect('/enrolled_courses')->with('success','Enrolled Course details deleted successfully');
    }
}
