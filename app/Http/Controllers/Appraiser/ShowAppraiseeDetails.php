<?php

namespace App\Http\Controllers\Appraiser;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowAppraiseeDetails extends Controller
{
    public function showDetails($userId){

        return view('appraiser.show-appraisee-details', ['userId' => $userId]);
    }


}
