<?php

namespace App\Http\Controllers;

use App\Shift;
use App\Course;
use Illuminate\Http\Request;

class ShiftController extends Controller
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
        $shifts = Shift::latest()->get();
        return view ('backend.shifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view ('backend.shifts.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shift = request()->validate([
            'course_id' => 'required',
            'day' => 'required',
            'shift1' => 'required',
            'shift2' => 'required'
        ]);

        Shift::create($shift);
        return redirect('/shifts')->with('success','Shift created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        $courses = Course::all();
        return view('backend.shifts.edit', compact('courses','shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        $shift->update(request()->validate([
            'course_id' => 'required',
            'day' => 'required',
            'shift1' => 'required',
            'shift2' => 'required',
        ]));

        return redirect('/shifts')->with('success','Shift updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = Shift::find($id);
        $shift->delete();
        return redirect('/shifts')->with('success','Shift deleted successfully');
    }
}
