<?php
namespace App\Livewire\Appraiser;

use App\Models\MidYearReview;
use App\Models\Target;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MidYearReviewForm extends Component
{
    public $userId;
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

        // Check if the user has already submitted a review for the current year
        $existingReview = MidYearReview::where('appraisee_id', $this->userId)
            ->whereYear('created_at', now()->year)
            ->first();

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
                'appraisee_id' => $this->userId,
                'appraiser_id' => Auth::id(),
            ]);
        }

        // Provide feedback to the user
        session()->flash('message', 'Mid-Year Review submitted successfully.');
    }

    public function mount()
    {
        // Fetch the user's existing review for the current year
        $userId = $this->userId;
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
