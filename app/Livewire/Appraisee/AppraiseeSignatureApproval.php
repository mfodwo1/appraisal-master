<?php

namespace App\Livewire\Appraisee;

use App\Models\PerformancePlan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppraiseeSignatureApproval extends Component
{

    public $performancePlan;
    public $appraiseeSignature;
    public function mount()
    {
        $user = Auth::user();
        $this->performancePlan = PerformancePlan::where('appraisee_id', $user->id)->get();
        if (!$this->performancePlan->isEmpty()) {
            // If there are matching performance plans, set the appraiseeSignature
            $this->appraiseeSignature = $user->signature;
        }
    }

    public function render()
    {
        return view('livewire.appraisee.appraisee-signature-approval');
    }


    public function approveAppraiseeSignature(): void
    {
        $user = Auth::user();

        $performancePlanItem = $this->performancePlan->first();
        if ($performancePlanItem && $user->id === $performancePlanItem->appraisee_id) {
            $performancePlanItem->appraisee_approve = true;
            $performancePlanItem->save();
        }
    }

    public function disapproveAppraiseeSignature(): void
    {
        $user = Auth::user();

        $performancePlanItem = $this->performancePlan->first();
        if ($performancePlanItem && $user->id === $performancePlanItem->appraisee_id) {
            $performancePlanItem->appraisee_approve = false;
            $performancePlanItem->save();

//            $this->loadData();
        }
    }


}
