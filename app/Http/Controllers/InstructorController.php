<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\Course;
use Illuminate\Http\Request;

class InstructorController extends Controller
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
        $instructors = Instructor::all();
        return view('backend.instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::latest()->get();
        return view ('backend.instructors.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instructor = request()->validate([
            'instructor_name' => 'required',
            'course_id' => 'required',
            'photo' => 'required|max:1999',
            'description' => 'required'
        ]);

        Instructor::create($instructor);
        return redirect('/instructors')->with('success','Instructor created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        $courses = Course::all();
        return view('backend.instructors.edit', compact('courses','instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        $instructor->update(request()->validate([
            'instructor_name' => 'required',
            'course_id' => 'required',
            'photo' => 'required|max:1999',
            'description' => 'required',
        ]));

        return redirect('/instructors')->with('success','Instructor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor = Instructor::find($id);
        $instructor->delete();
        return redirect('/instructors')->with('success','Instructor deleted successfully');
    }
}
