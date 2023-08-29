<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleClass;
use Illuminate\Routing\Controller;

class BookingsController extends Controller
{
    //create shows the view file
    public function create()  {
        $scheduledClasses=ScheduleClass::upcoming()
        ->with('classType','instructor')
        ->notBooked()
        ->oldest('date_time')->get();
        return view('member.book')->with('scheduledClasses',$scheduledClasses);


    }
    public function store(Request $request) {
        auth()->user()->bookings()->attach($request->scheduled_class_id);

        return redirect()->route('booking.index');
    }
     public function index() {
        $bookings = auth()->user()->bookings()->upcoming()->get();
        return view('member.upcoming')->with('bookings',$bookings);
    }

    public function destroy(int $id) {

        auth()->user()->bookings()->detach($id);
        return redirect()->route('booking.index');


    }

}
