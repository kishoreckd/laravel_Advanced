<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleClass;
use Illuminate\Routing\Controller;

class BookingsController extends Controller
{
    //create shows the view file
    public function create()  {
        $scheduledClasses=ScheduleClass::where('date_time','>',now())->with('classType','instructor')->oldest()->get();
        return view('member.book')->with('scheduledClasses',$scheduledClasses);



    }
    public function index()  {

    }
    public function store()  {

    }
    public function destroy()  {

    }
}
