<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use App\Models\ScheduleClass;
use Illuminate\Http\Request;

class SheduledClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**getting value from model scheduleclasses */
        $scheduledClasses =auth()->user()->ScheduleClasses()->where('date_time','>',now())->oldest('date_time')->get();
        return view('instructor.upcoming')->with('scheduledClasses',$scheduledClasses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //returns class_types

        $classTypes=ClassType::all();
        // dd($classTypes);
        /**Returning a view file for instructor to schedule */
        return view('instructor.schedule')->with('classTypes',$classTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $date_time =$request->input('date')." ".$request->input('time');


        /**This below code merges into request parameter array */
       $request->merge([
            'date_time'=>$date_time,
            'instructor_id'=>auth()->id()
       ]);

    //    dd($request);

       $validated =$request->validate([
        'class_type_id' => 'required',
        'instructor_id' => 'required',
        'date_time' => 'required|unique:schedule_classes,date_time|after:now'
       ]);

       ScheduleClass::create($validated);

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
