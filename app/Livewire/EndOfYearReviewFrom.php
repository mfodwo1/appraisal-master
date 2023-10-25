<?php

namespace App\Livewire;

use App\Models\Target;
use Livewire\Component;
use App\Models\EndOfYearReview;
use Illuminate\Support\Facades\Auth;
class EndOfYearReviewFrom extends Component
{
    public $targets = [];
    public $performanceAssessment;
    public $score;
    public $comment;
    public $existingReview; // Property to store the existing review if any

    public function submitEndOfYearReview()
    {
        try {
            // Validation rules (you can customize these based on your requirements)
            $this->validate([
                'targets' => 'required|array', // Make sure 'targets' is an array
                'targets.*.performanceAssessment' => 'required', // Requires each target to have performance assessment
                'targets.*.score' => 'required', // Requires each target to have a score
                'targets.*.comment' => 'required', // Requires each target to have a comment
            ]);

            // Get the currently authenticated user's ID
            $user = Auth::user();

            // Begin a database transaction
            \DB::beginTransaction();

            // Loop through the submitted targets and create/update the reviews
            foreach ($this->targets as $key => $targetData) {
                $targetId = $this->targets[$key]['id'];

                // Find the existing review if it exists
                $existingReview = EndOfYearReview::where('targets_id', $targetId)
                    ->whereYear('created_at', now()->year) // Assuming a 'created_at' timestamp field
                    ->first();

                //Fetch appraiser
                $appraiser = $user::where('department_id', $user->department_id)
                    ->where('user_type', 'Appraiser')
                    ->first();
                if ($appraiser) {
                    $appraiserId = $appraiser->id;
                } else {
                    session()->flash('error', 'You do not have appraiser');
                }

                // Prepare the data for the review
                $reviewData = [
                    'performance_assessment' => $targetData['performanceAssessment'],
                    'score' => $targetData['score'],
                    'comment' => $targetData['comment'],
                    'targets_id' => $targetId,
                    'appraisee_id' => $user->id,
                    'appraiser_id' => $appraiserId,
                ];

                if ($existingReview) {
                    // Update the existing review
                    $existingReview->update($reviewData);
                } else {
                    // Create a new EndOfYearReview record
                    EndOfYearReview::create($reviewData);
                }
            }

            // Commit the database transaction
            \DB::commit();

            // Reset form fields
            $this->performanceAssessment = '';
            $this->score = '';
            $this->comment = '';

            // Provide feedback to the user
            session()->flash('message', 'End of Year Reviews submitted successfully');
        } catch (\Exception $e) {
            // Handle any database or other exceptions
            \DB::rollback(); // Rollback the transaction in case of an exception
            session()->flash('error', 'An error occurred while submitting the reviews');
        }
    }




    public function mount()
    {
        // Get the currently authenticated user's ID
        $userId = Auth::id();

        // Load the list of targets
        $this->targets = Target::whereHas('performancePlan', function ($query) use ($userId) {
            $query->where('appraisee_id', $userId);
        })->get();

        // Initialize the $targets array with the necessary structure
        $this->targets = $this->targets->map(function ($target) {
            return [
                'id' => $target->id,
                'target' => $target->target,
                'performanceAssessment' => '', // Initialize as empty
                'score' => '', // Initialize as empty
                'comment' => '', // Initialize as empty
            ];
        })->toArray();

        // Initialize other form fields
        $this->performanceAssessment = ''; // Initialize as empty
        $this->score = ''; // Initialize as empty
        $this->comment = ''; // Initialize as empty

        // Check if the user has already submitted a form for the current year
        $this->existingReview = EndOfYearReview::where('appraisee_id', $userId)
            ->whereYear('created_at', now()->year)
            ->first();

        // If an existing review is found, load the data for editing
        if ($this->existingReview) {
            $this->performanceAssessment = $this->existingReview->performance_assessment;
            $this->score = $this->existingReview->score;
            $this->comment = $this->existingReview->comment;

            // Load the existing review data into the form fields
            foreach ($this->targets as $key => $target) {

                if ($this->existingReview) {
                    $existingTarget = $this->existingReview->where('targets_id', $target['id'])->first();
                    if ($existingTarget) {
                        $this->targets[$key]['performanceAssessment'] = $existingTarget->performance_assessment;
                        $this->targets[$key]['score'] = $existingTarget->score;
                        $this->targets[$key]['comment'] = $existingTarget->comment;
                    }
                }
            }
        }
    }



    public function render()
    {
        return view('livewire.end-of-year-review-from');
    }
}
