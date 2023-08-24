<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        switch (auth()->user()->role) {
            case 'instructor':
                # code...
                /**It returns whther the user is instructor */
                return redirect()->route('instructor.dashboard');
                break;
            case 'admin':
                /**It returns whther the user is admin */
                return redirect()->route('admin.dashboard');
                break;
                
            case 'member':
                /**It returns whther the user is member */
                return redirect()->route('member.dashboard');
                break;

            default:
                # code...
                  return redirect()->route('login');
                break;
        }
        //
    }
}
