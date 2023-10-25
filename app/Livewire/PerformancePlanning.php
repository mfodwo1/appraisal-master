<?php


namespace App\Livewire;

use App\Models\Department;
use App\Models\Target;
use App\Models\User;
use Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\PerformancePlan;

// Adjust this to your model

class PerformancePlanning extends Component
{
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
        $this->appraiseeSignature = Auth::user()->signature;
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
                // Add other data here if needed
            ];

            return view('livewire.appraisee.performance-planning', $data);
        }
        else{
            return view('livewire.appraisee.performance-planning');
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
        // Get the currently authenticated user's ID
        $userId = Auth::id();
        // Fetch the user's department
        $user = User::find($userId);
        $department = Department::find($user->department_id);


        // Check if the user has already submitted a Performance plan for the current year
        $existingPerformancePlan = PerformancePlan::where('appraisee_id', $userId)->whereYear('created_at', now()->year)->first();

        // Check if the department has an appraiser
        if ($department && $department->appraiser_id) {
            $appraiserId = $department->appraiser_id;
            $departmentId = $department->id;

            if ($existingPerformancePlan) {
                session()->flash('error', 'Form already submitted.');

            } else {
            // Create a new PerformancePlan record with the appraiser ID
            $performancePlan = PerformancePlan::create([
                'appraisee_id' => $userId,
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

        $this->appraiseeSignature = Auth::user()->signature;

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
        $userId = Auth::id();
        // Check if the user has already submitted a Performance plan for the current year
        $existingPerformancePlan = PerformancePlan::where('appraisee_id', $userId)->whereYear('created_at', now()->year)->first();
        if ($existingPerformancePlan){
            $this->formSubmitted = true;
        }else{
            $this->formSubmitted = false;
        }
    }


}








//
//namespace App\Livewire;
//
//use App\Models\PerformancePlanningForm;
//use Livewire\Component;
//use Illuminate\Support\Facades\Auth;
//use function Laravel\Prompts\error;
//
//class PerformancePlanning extends Component
//{
//    public $keyResultArea;
//    public $target1;
//    public $target2;
//    public $target3;
//    public $target4;
//    public $target5;
//    public $resourceRequired;
//    public $userSignature;
//    public $checkSubmission;
//
//
//
//    public function mount()
//    {
//        $user = Auth::user();
//
//        // Check if the user has submitted a performance planning form for the current year
//        $currentYear = now()->year;
//        $existingForm = PerformancePlanningForm::where('user_id', $user->id)
//            ->whereYear('created_at', $currentYear)
//            ->first();
//
//        if ($existingForm) {
//            $this->keyResultArea = $existingForm->key_result_area;
//            $this->target1 = $existingForm->target_1;
//            $this->target2 = $existingForm->target_2;
//            $this->target3 = $existingForm->target_3;
//            $this->target4 = $existingForm->target_4;
//            $this->target5 = $existingForm->target_5;
//            $this->resourceRequired = $existingForm->resource_required;
//            // Retrieve the user's signature path from the user model
////            $this->userSignature = $user->signature;
//        }
//    }
//
//    public function render()
//    {
//
//        return view('livewire.performance-planning');
//    }
//
//    public function submitPerformancePlanning()
//    {
//        $this->validate([
//            'keyResultArea' => 'required',
//            'target1' => 'required',
//            'target2' => 'required',
//            'target3' => 'required',
//            'target4' => 'required',
//            'target5' => 'required',
//            'resourceRequired' => 'required',
//        ]);
//
//        $user = Auth::user();
//        $currentYear = now()->year;
//
//        try {
//            // Check if the user has submitted a performance planning form for the current year
//            $existingForm = PerformancePlanningForm::where('user_id', $user->id)
//                ->whereYear('created_at', $currentYear)
//                ->first();
//
//            if ($existingForm) {
//                // Update the existing form
//                $existingForm->update([
//                    'key_result_area' => $this->keyResultArea,
//                    'target_1' => $this->target1,
//                    'target_2' => $this->target2,
//                    'target_3' => $this->target3,
//                    'target_4' => $this->target4,
//                    'target_5' => $this->target5,
//                    'resource_required' => $this->resourceRequired,
//                ]);
//            } else {
//                // Create a new form entry
//                $existingForm = PerformancePlanningForm::create([
//                    'user_id' => $user->id,
//                    'key_result_area' => $this->keyResultArea,
//                    'target_1' => $this->target1,
//                    'target_2' => $this->target2,
//                    'target_3' => $this->target3,
//                    'target_4' => $this->target4,
//                    'target_5' => $this->target5,
//                    'resource_required' => $this->resourceRequired,
//                ]);
//            }
//
//            // Display a success message
//            session()->flash('success', 'Performance planning form submitted successfully.');
//
//        } catch (\Exception $e) {
//            // Handle exceptions and display an error message
//            session()->flash('error', 'An error occurred while updating the profile: ' . $e->getMessage());
//        }
//    }
//
//}
