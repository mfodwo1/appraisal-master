<?php

namespace App\Http\Controllers\Appraiser;

class DisplayAppraiserDetailController
{
    public function showAppraiserDetails(){
        return view('appraiser.appraisee-list');
    }
}
