<?php

namespace App\Http\Controllers\Appraiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppraiseeListController extends Controller
{
    public function showForm(){
        return view('appraiser.appraisee-list');
    }


}
