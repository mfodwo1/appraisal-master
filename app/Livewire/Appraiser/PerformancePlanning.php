<?php


namespace App\Livewire\Appraiser;

use App\Models\Department;
use App\Models\PerformancePlan;
use App\Models\User;
use Auth;
use Livewire\Component;

// Adjust this to your model

class PerformancePlanning extends Component
{
    public $userId;
    public $keyResultArea;
    public $resourceRequired;
    public $tasks = [];
    public $performancePlans;

    public $formSubmitted = false;


    protected $listeners = [
        'performancePlanAdded' => 'refreshPerformancePlans',
    ];
    public function refreshPerformancePlans(): void
    {
        $this->mount();
    }

    // Initialize the Livewire component
    public function mount()
    {
        $this->toggleForm();
        $this->performancePlans = PerformancePlan::with('targets')->get();
        $this->appraiserSignature = Auth::user()->signature;
        // Add two default targets to the tasks array
        $this->tasks[] = ['target' => ''];
        $this->tasks[] = ['target' => ''];
    }

    public function render()
    {
        if (!empty($this->performancePlans)) {
            // Retrieve the performance plan from the $this->performancePlan property
            $performancePlan = $this->performancePlans;
            // Create an associative array with data to pass to the view
            $data = [
                'performancePlan' => $performancePlan,
                'userID'=>$this->userId,
                // Add other data here if needed
            ];

            return view('livewire.appraiser.performance-planning', $data);
        }
        else{
            return view('livewire.appraiser.performance-planning');
        }
    }

    public function submitPerformancePlanning()
    {
        // Validate the form data
        $this->validate([
            'keyResultArea' => 'required|string|max:255',
            'resourceRequired' => 'required|string|max:255',
            'tasks.*.target' => 'required|string|max:255',
        ]);

        // Fetch the user's department
        $user = User::find($this->userId);
        $department = Department::find($user->department_id);


        // Check if the user has already submitted a Performance plan for the current year
        $existingPerformancePlan = PerformancePlan::where('appraisee_id', $this->userId)->whereYear('created_at', now()->year)->first();

        // Check if the department has an appraiser
        if ($department && $department->appraiser_id) {
            $appraiserId = $department->appraiser_id;
            $departmentId = $department->id;

            if ($existingPerformancePlan) {
                session()->flash('error', 'Form already submitted.');

            } else {
            // Create a new PerformancePlan record with the appraiser ID
            $performancePlan = PerformancePlan::create([
                'appraisee_id' => $this->userId,
                'appraiser_id' => $appraiserId,
                'key_result_area' => $this->keyResultArea,
                'resource_required' => $this->resourceRequired,
                'department_id'=>$departmentId,
            ]);

            // Rest of your code...

        // Create Target records associated with the PerformancePlan
        foreach ($this->tasks as $task) {
            $performancePlan->targets()->create([
                'target' => $task['target'],
            ]);
        }

        $this->dispatch('performancePlanAdded');
        // Clear the form fields
        $this->keyResultArea = '';
        $this->resourceRequired = '';
        $this->tasks = [];

        $this->appraiserSignature = Auth::user()->signature;

                // Show success message
        session()->flash('success', 'Performance planning submitted successfully.');
        }
        } else {
            session()->flash('error', 'Performance planning not submitted.');
        }
    }


    public function addTask()
    {
        $this->tasks[] = ['target' => ''];
    }

    public function toggleForm(){
        // Check if the user has already submitted a Performance plan for the current year
        $existingPerformancePlan = PerformancePlan::where('appraisee_id', $this->userId)->whereYear('created_at', now()->year)->first();
        if ($existingPerformancePlan){
            $this->formSubmitted = true;
        }else{
            $this->formSubmitted = false;
        }
    }
}
