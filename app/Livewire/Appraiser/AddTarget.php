<?php

namespace App\Livewire\Appraiser;

use App\Models\Target;
use Livewire\Component;

class AddTarget extends Component
{
    public $planId;
    public $newTarget;

    public function render()
    {
        return view('livewire.appraiser.add-target');
    }

    public function addTarget()
    {
        $this->validate([
            'newTarget' => 'required|string|max:255',
        ]);

        // Create a new Target instance and associate it with the plan using plan_id
        $target = new Target();
        $target->performance_plan_id = $this->planId;
        $target->target = $this->newTarget;
        $target->save();

        // Reset the input field
        $this->newTarget = '';

        // Emit an event to notify the PerformancePlanList component to refresh targets
        $this->dispatch('targetAdded');
    }
}
