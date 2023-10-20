<?php


namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\PerformancePlan;
use App\Models\Target;

class PerformancePlanList extends Component
{
    public $editMode = false;
    public $editPlanId;
    public $editTargetMode = false;
    public $keyResultArea;
    public $resourceRequired;
    public $editedTargets = [];
    public $performancePlans;



    #[on('performancePlanAdded')]
    public function refreshPerformancePlans(): void
    {
        // Refresh the performance plans data
        $user = Auth::user();
        $this->performancePlans = PerformancePlan::where('appraisee_id', $user->id)->with('targets')->get();
    }

    public function render()
    {
        $user = Auth::user();
        $this->performancePlans = PerformancePlan::where('appraisee_id', $user->id)->with('targets')->get();
        return view('livewire.appraisee.performance-plan-list');
    }

    public function edit($id): void
    {
        $this->resetForm();
        $this->editMode = true;
        $this->editPlanId = $id;

        $plan = PerformancePlan::findOrFail($id);
        $this->keyResultArea = $plan->key_result_area;
        $this->resourceRequired = $plan->resource_required;
    }

    public function update($id): void
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

    public function delete($id): void
    {
        PerformancePlan::find($id)->delete();
    }

    public function deleteTarget($id): void
    {
        Target::find($id)->delete();
    }

    public function refreshOnDelete(){

    }
    public function editTargets($planId)
    {
        $this->resetForm();
        $this->editTargetMode = true;
        $this->editPlanId = $planId;

        $plan = PerformancePlan::findOrFail($planId);
        $targets = $plan->targets;

        foreach ($targets as $target) {
            $this->editedTargets[$target->id] = $target->target;
        }
    }

    public function updateTargets($planId)
    {
        $this->validate([
            'editedTargets.*' => 'required|string|max:255',
        ]);

        $plan = PerformancePlan::findOrFail($planId);

        foreach ($this->editedTargets as $targetId => $targetText) {
            $target = Target::findOrFail($targetId);
            $target->update([
                'target' => $targetText,
            ]);
        }

        $this->editTargetMode = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->editPlanId = null;
        $this->keyResultArea = '';
        $this->resourceRequired = '';
        $this->editedTargets = [];
    }

    public function cancelEdit()
    {
        $this->editMode = false;
        $this->editTargetMode = false;
        $this->resetForm();
    }

    #[on('targetAdded')]
    public function refreshTargets(): void
    {
        if ($this->editPlanId) {
            // Get the performance plan and its associated targets
            $plan = PerformancePlan::findOrFail($this->editPlanId);
            $targets = $plan->targets;

            // Update the $editedTargets array with the refreshed data
            $this->editedTargets = $targets->pluck('target', 'id')->toArray();
        }
    }

}
