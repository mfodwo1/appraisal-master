<?php

namespace App\Livewire;

use App\Models\PerformancePlan;
use Livewire\Component;
class MidYearReviewList extends Component
{
    public $editMode = false;
    public $editPlanId;
    public $keyResultArea;
    public $resourceRequired;
    public $editedTargets = [];
    public $performancePlan;

    public function render()
    {
        return view('livewire.appraisee.mid-year-review-form', [
            'performancePlan' => $this->performancePlan,
        ]);
    }

    public function edit($id)
    {
        $this->resetForm();
        $this->editMode = true;
        $this->editPlanId = $id;

        $plan = PerformancePlan::findOrFail($id);
        $this->performancePlan = $plan;
        $this->keyResultArea = $plan->key_result_area;
        $this->resourceRequired = $plan->resource_required;
    }

    public function update($id)
    {
        $this->validate([
            'keyResultArea' => 'required|string|max:255',
            'resourceRequired' => 'required|string|max:255',
        ]);

        $plan = PerformancePlan::findOrFail($id);
        $plan->update([
            'key_result_area' => $this->keyResultArea,
            'resource_required' => $this->resourceRequired,
        ]);

        $this->editMode = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->editPlanId = null;
        $this->keyResultArea = '';
        $this->resourceRequired = '';
    }

    public function cancelEdit()
    {
        $this->editMode = false;
        $this->resetForm();
    }
}
