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
        $userId = Auth::id();

        // Check if the user has already submitted a review for the current year
        $existingReview = MidYearReview::where('appraisee_id', $userId)
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
                'appraisee_id' => $userId,
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









//
//namespace App\Livewire;
//
//use Livewire\Component;
//use App\Models\PerformancePlanningForm;
//use Illuminate\Support\Facades\Auth;
//
//
//class MidYearReviewForm extends Component
//{
//    public $targetProgressReview;
//    public $target1;
//    public $target2;
//    public $target3;
//    public $target4;
//    public $target5;
//    public $targetRemarks;
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
//            $this->targetProgressReview = $existingForm->targets_progress_review;
//            $this->target1 = $existingForm->target_1;
//            $this->target2 = $existingForm->target_2;
//            $this->target3 = $existingForm->target_3;
//            $this->target4 = $existingForm->target_4;
//            $this->target5 = $existingForm->target_5;
//            $this->targetRemarks = $existingForm->targets_remarks;
//
//        }
//    }
//
//    public function render()
//    {
//
//        return view('livewire.mid-year-review-form');
//    }
//
//    public function submitMidYearReview()
//    {
//        $this->validate([
//            'targetProgressReview' => 'required',
//            'targetRemarks' => 'required',
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
//                    'targets_progress_review' => $this->targetProgressReview,
//                    'targets_remarks' => $this->targetRemarks,
//                ]);
//            } else {
//                // Create a new form entry
//                $existingForm = PerformancePlanningForm::create([
//                    'user_id' => $user->id,
//                    'targets_progress_review' => $this->targetProgressReview,
//                    'targets_remarks' => $this->targetRemarks,
//                ]);
//            }
//
//            // Display a success message
//            session()->flash('message', 'Performance planning form submitted successfully.');
//
//        } catch (\Exception $e) {
//            // Handle exceptions and display an error message
//            session()->flash('error', 'An error occurred while updating the profile: ' . $e->getMessage());
//        }
//
//        return $existingForm;
//    }
//
//
////    public function approveAppraiser(): void
////    {
////        $user = Auth::user();
////        $submission = $this->submitPerformancePlanning();
////
////        if ($submission && $user->user_type === 'Appraiser') {
////            $submission->update([
////                'appraiser_approve' => true,
////            ]);
////        }
////    }
////
////    public function appraiserDisapprove(): void
////    {
////        $user = Auth::user();
////        $submission = $this->submitPerformancePlanning();
////
////        if ($submission && $user->user_type === 'Appraiser') {
////            $submission->update([
////                'appraiser_approve' => false,
////            ]);
////        }
////
////        session()->flash('message', 'Performance planning form disapproved.');
////    }
////
////    public function approveAppraisee()
////    {
////        $user = Auth::user();
////        $submission = $this->submitPerformancePlanning();
////
////        if ($submission && $user->user_type === 'Appraisee') {
////            $submission->update([
////                'appraisee_approve' => true,
////            ]);
////        }
////    }
////
////    public function appraiseeDisapprove(): void
////    {
////        $user = Auth::user();
////        $submission = $this->submitPerformancePlanning();
////
////        if ($submission && $user->user_type === 'Appraisee') {
////            $submission->update([
////                'appraisee_approve' => false,
////            ]);
////        }
////
////        session()->flash('message', 'Performance planning form disapproved.');
////    }
//}
