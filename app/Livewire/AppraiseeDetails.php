<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AppraiseeDetails extends Component
{
    public $appraisee;
    #[Computed]
    public function ShowAppraiseeDetails()
    {
        return User::find($this->appraiseeId);
    }



    public function render()
    {
        return view('livewire.appraisee-details');
    }
}
