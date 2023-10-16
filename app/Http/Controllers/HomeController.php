<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function rollBaseAccess()
    {
        if(Auth::id())
        {
            $user_type = Auth::user()->user_type;
            if($user_type === 'Appraisee'){
                return view('appraisee.dashboard');
            }
            else if($user_type === 'Appraiser'){
                return view('appraiser.dashboard');
            }
            else if($user_type === 'HOD'){
                return view('hod.dashboard');
            }
            else if($user_type === 'Guest'){
                return view('guest.dashboard');
            }

            else
            {
                return redirect()->back();
            }
        }
    }
}
