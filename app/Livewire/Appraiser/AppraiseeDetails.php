<?php

namespace App\Livewire\Appraiser;

use App\Models\MidYearReview;
use App\Models\PerformancePlan;
use App\Models\Target;
use App\Models\TrainingRecord;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AppraiseeDetails extends Component
{
    public $userId;

    // Computed property to fetch and prepare user details
    #[Computed]
    public function UserDetails()
    {
        return User::find($this->userId);
    }

    #[Computed]
    public function TrainingRecords()
    {
        return TrainingRecord::where('appraisee_id', $this->userId)->get();
    }

    #[Computed]
    public function PerfomancePlanRecords()
    {
        return PerformancePlan::where('appraisee_id', $this->userId)->first();

    }
    #[Computed]
    public function TargetRecords()
    {
        $performancePlanId = PerformancePlan::where('appraisee_id', $this->userId)->pluck('id')->first();
        return Target::where('performance_plan_id', $performancePlanId)->get();
    }
    #[Computed]
    public function MidYearReviewRecords()
    {
        return MidYearReview::where('appraisee_id',  $this->userId)->first();
    }
    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        return view('livewire.appraiser.appraisee-details');
    }
}
