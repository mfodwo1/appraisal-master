<?php

namespace App\Livewire\Appraisee;

use App\Models\PerformancePlan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppraiserSignatureApproval extends Component
{
    public  $performancePlanItem;
    public $appraiserSignature;

    public function mount()
    {
        $user = Auth::user();
        $appraisee = PerformancePlan::where('appraisee_id', $user->id)->where('appraiser_approve', 1)->first();
        if ($appraisee) {
            $departmentId = $user->department_id;
            $this->appraiserSignature = User::where('department_id', $departmentId)
                ->where('user_type', 'appraiser')
                ->pluck('signature')->first();
        }
    }

    public function render()
    {
        return view('livewire.appraisee.appraiser-signature-approval');
    }


}








//
//namespace App\Livewire;
//
//use App\Models\PerformancePlan;
//use Livewire\Component;
//use Illuminate\Support\Facades\Auth;
//
//class AppraiseeSignatureApproval extends Component
//{
//    public $performancePlan;
//
//    public function mount($performancePlan)
//    {
//        $this->performancePlan = $performancePlan;
//    }
//
//    public function render()
//    {
//        return view('livewire.appraiser-signature-approval');
//    }
//
//    public function approveAppraiserSignature()
//    {
//        $user = Auth::user();
//        $performancePlan = PerformancePlan::find($this->performancePlan);
//
//        // Check if the authenticated user is the appraiser of this plan
//        if ($user->id === $performancePlan->appraiser_id) {
//            // Approve the appraiser's signature
//            $performancePlan->appraiser_approve = true;
//            $performancePlan->save();
//        }
//    }
//}
