<?php
namespace App\Livewire;

use App\Models\Target;
use Livewire\Component;
use App\Models\MidYearReview;
use Illuminate\Support\Facades\Auth;

class MidYearReviewForm extends Component
{
    public $targets;
    public $progressReview;
    public $remarks;
    public $existingReview; // Property to store the existing review if any

    public function submitPerformancePlanning()
    {
        // Validation rules (you can customize these based on your requirements)
        $this->validate([
            'progressReview' => 'required',
            'remarks' => 'required',
        ]);

        // Get the currently authenticated user's ID
        $user = Auth::user();

        // Check if the user has already submitted a review for the current year
        $existingReview = MidYearReview::where('appraisee_id', $user->id)
            ->whereYear('created_at', now()->year)
            ->first();

        $appraiser = $user::where('department_id', $user->department_id)
            ->where('user_type', 'Appraiser')
            ->first();
        if ($appraiser) {
            $appraiserId = $appraiser->id;
        } else {
            session()->flash('error', 'You do not have appraiser');
        }

        if ($existingReview) {
            // Update the existing review
            $existingReview->update([
                'targets_progress_review' => $this->progressReview,
                'targets_remarks' => $this->remarks,
            ]);
        } else {
            // Create a new MidYearReview record
            $midYearReview = MidYearReview::create([
                'targets_progress_review' => $this->progressReview,
                'targets_remarks' => $this->remarks,
                'appraisee_id' => $user->id,
                'appraiser_id' => $appraiserId,
            ]);
        }

        // Reset form fields
        $this->progressReview = '';
        $this->remarks = '';

        // Provide feedback to the user
        session()->flash('message', 'Mid-Year Review submitted successfully.');
    }

    public function mount()
    {
        // Fetch the user's existing review for the current year
        $userId = Auth::id();

        $this->targets = Target::whereHas('performancePlan', function ($query) use ($userId) {
            $query->where('appraisee_id', $userId);
        })->get();

        $this->existingReview = MidYearReview::where('appraisee_id', $userId)
            ->whereYear('created_at', now()->year)
            ->first();

        if ($this->existingReview) {
            // Populate form fields with existing review data
            $this->progressReview = $this->existingReview->targets_progress_review;
            $this->remarks = $this->existingReview->targets_remarks;
        }
    }
    public function render()
    {
        return view('livewire.appraisee.mid-year-review-form');
    }
}
