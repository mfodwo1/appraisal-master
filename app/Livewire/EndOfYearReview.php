<?php

namespace App\Livewire;

use App\Models\PerformancePlanningForm;
use Livewire\Component;

class EndOfYearReview extends Component
{
    public $target1;
    public $performanceAssessment;
    public $targetWeight;
    public $score;
    public $comment;
    public $user_id;

    public function render()
    {
        $userSubmissions = PerformancePlanningForm::where('user_id', $this->user_id)->get();
        return view('livewire.appraisee.end-of-year-review', [
            'userSubmissions' => $userSubmissions,
        ]);
    }

    public function submitForm()
    {
        $this->validate([
            'target1' => 'required',
            'performanceAssessment' => 'required',
            'targetWeight' => 'required',
            'score' => 'required',
            'comment' => 'required',
        ]);

        // Check if the user has submitted five entries for the year (you'll need to implement this logic)

        // Save the form data to the database
        PerformancePlanningForm::update([
            'target_1' => $this->target1,
            'performance_assessment' => $this->performanceAssessment,
            'score' => $this->score,
            'comment' => $this->comment,
            'user_id' => $this->user_id,
            // ... other fields ...
        ]);

        // Reset form fields
        $this->reset(['target1', 'performanceAssessment', 'targetWeight', 'score', 'comment']);

        // Optionally, you can add a success message or redirect the user.
    }

    public function editSubmission($submissionId)
    {
        // Find the submission by ID and set the editing state
        $submission = PerformancePlanningForm::find($submissionId);

        if ($submission) {
            // Set the Livewire properties for editing
            $this->target1 = $submission->target_1;
            $this->performanceAssessment = $submission->performance_assessment;
            // Set similar properties for other fields
            // ...
        }
    }

}
