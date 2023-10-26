<?php

namespace App\Livewire\Appraiser;

use App\Models\PerformancePlan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppraiseeSignatureApproval extends Component
{
    public $userId;
    public  $performancePlanItem;
    public $appraiseeSignature;

    public function mount()
    {
        $appraisee = PerformancePlan::where('appraisee_id', $this->userId)->where('appraisee_approve', 1)->first();

        if ($appraisee) {
//            $departmentId = $performancePlanItem->department_id;
//            $appraiser = User::where('department_id', $departmentId)
//                ->where('user_type', 'appraiser')
//                ->first();
//            if ($appraiser) {
                $this->appraiseeSignature = User::where('id', $this->userId)->pluck('signature')->first();
//            }
        }
    }




    public function render()
    {
        return view('livewire.appraiser.appraisee-signature-approval');
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
