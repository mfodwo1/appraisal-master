<?php

namespace App\Livewire\Appraiser;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class DisplayAppraiseeInfo extends Component
{
    public $appraiser;
    public $appraisees;
    public $selectedAppraiseeId;

    public $showDetails = false;



    public function selectedAppraisee()
    {
        return User::find($this->selectedAppraiseeId);
    }

    public function render()
    {
        return view('livewire.appraiser.display-appraisee-info');

    }



    public function mount()
    {
        $this->appraiser = Auth::user();
        $this->loadAppraisees();
    }

    public function loadAppraisees()
    {
        $this->appraisees = User::where('department_id', $this->appraiser->department_id)
            ->where('user_type', 'Appraisee')
            ->get();
    }

    public function markComplete($appraiseeId)
    {
        $appraisee = User::find($appraiseeId);
        $appraisee->appraisal_status = 1;
        $appraisee->save();
        $this->loadAppraisees();
    }

    public function markNotComplete($appraiseeId)
    {
        $appraisee = User::find($appraiseeId);
        $appraisee->appraisal_status = 0;
        $appraisee->save();
        $this->loadAppraisees();
    }

}
