<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use App\Models\ScheduleClass;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Nette\Schema\Schema;

class SheduledClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**getting value from model scheduleclasses */
        $scheduledClasses = auth()->user()->ScheduleClasses()->upcoming()->oldest('date_time')->get();
        return view('instructor.upcoming')->with('scheduledClasses', $scheduledClasses);
        // dd($scheduledClasses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //returns class_types

        $classTypes = ClassType::all();
        // dd($classTypes);
        /**Returning a view file for instructor to schedule */
        return view('instructor.schedule')->with('classTypes', $classTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $date_time = $request->input('date') . " " . $request->input('time');


        /**This below code merges into request parameter array */
        $request->merge([
            'date_time' => $date_time,
            'instructor_id' => auth()->id()
        ]);

        //    dd($request);

        $validated = $request->validate([
            'class_type_id' => 'required',
            'instructor_id' => 'required',
            'date_time' => 'required|unique:schedule_classes,date_time|after:now'
        ]);

        ScheduleClass::create($validated);

        //
        return redirect()->route('schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScheduleClass $schedule)
    {
        //old one before policy
        // if (auth()->user()->id !== $schedule->instructor_id) {
        //     # code...

        //     abort(403);
        // }

        if (auth()->user()->cannot('delete', $schedule)) {
            # code...
            abort(403);

        }


        $schedule->delete();
        return redirect()->route('schedule.index');
    }
}
