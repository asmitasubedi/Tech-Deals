<?php

namespace App\Http\Controllers;

use App\CourseBanner;
use App\Course;
use Illuminate\Http\Request;

class CourseBannerController extends Controller
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
        $course_banners = CourseBanner::latest()->get();
        return view('backend.course_banners.index', compact('course_banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view ('backend.course_banners.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course_banner = request()->validate([
            'course_id' => 'required',
            'course_banner' => 'required|max:1999',
        ]);

        CourseBanner::create($course_banner);
        return redirect('/course_banners')->with('success','Course Banner created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseBanner  $courseBanner
     * @return \Illuminate\Http\Response
     */
    public function show(CourseBanner $courseBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseBanner  $courseBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseBanner $courseBanner)
    {
        $courses = Course::all();
        return view('backend.course_banners.edit', compact('courses','courseBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseBanner  $courseBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseBanner $courseBanner)
    {
        $courseBanner->update(request()->validate([
            'course_id' => 'required',
            'course_banner' => 'required|max:1999'
        ]));

        return redirect('/course_banners')->with('success','Course Banner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseBanner  $courseBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseBanner = CourseBanner::find($id);
        $courseBanner->delete();
        return redirect('/course_banners')->with('success','Course Banner deleted successfully');
    }
}
