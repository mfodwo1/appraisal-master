<?php

namespace App\Livewire\Appraiser;

use App\Models\PerformancePlan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppraiserSignatureApproval extends Component
{

    public $performancePlan;
    public $appraiserSignature;
    public function mount()
    {
        $user = Auth::user();
        $this->performancePlan = PerformancePlan::where('appraiser_id', $user->id)->get();
        if (!$this->performancePlan->isEmpty()) {
            // If there are matching performance plans, set the appraiseeSignature
            $this->appraiserSignature = $user->signature;
        }
    }

    public function render()
    {
        return view('livewire.appraiser.appraiser-signature-approval');
    }

    public function approveAppraiserSignature(): void
    {
        $user = Auth::user();

        $performancePlanItem = $this->performancePlan->first();
        if ($performancePlanItem && $user->id === $performancePlanItem->appraiser_id) {
            $performancePlanItem->appraiser_approve = true;
            $performancePlanItem->save();
        }
    }
    public function disapproveAppraiserSignature(): void
    {
        $user = Auth::user();
        $performancePlanItem = $this->performancePlan->first();
        if ($performancePlanItem && $user->id === $performancePlanItem->appraiser_id) {
            $performancePlanItem->appraiser_approve = false;
            $performancePlanItem->save();
        }
    }


}
