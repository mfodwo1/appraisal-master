<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;
class AppraisalCommentsForm extends Component

{

    public $comments;
    public $appraiserSignature;
    public $appraiserDate;


    public function render()
    {
//        // Check if the user has already submitted a comment for the current year
//        $user = Auth::user();
//        $currentYear = now()->year;
//
//        $existingComment = $user->Comment()
//            ->whereYear('created_at', $currentYear)
//            ->first();
//
//        if ($existingComment) {
//            // If a comment exists for the current year, pre-fill the form
//            $this->comments = $existingComment->comments;
//            $this->appraiserDate = $existingComment->appraiser_date;
//            // You can also pre-fill the appraiserSignature field if needed
//        }

        return view('livewire.appraisee.appraisal-comments-form');
    }

    public function submitcomment(): void
    {
        // Validate form inputs
        $this->validate([
            'comments' => 'required',
//            'appraiserSignature' => 'image', // Add validation rules for the signature if needed
//            'appraiserDate' => 'required|date',
        ]);

        // Associate the data with the currently logged-in user
        $user = Auth::user();
        $currentYear = now()->year;

        // Check if the user has already submitted a comment for the current year
        $existingComment = $user->appraisalComments()
            ->whereYear('created_at', $currentYear)
            ->first();

        if ($existingComment) {
            // If a comment exists for the current year, update it
            $existingComment->update([
                'comments' => $this->comments,
//                'appraiser_signature' => $this->appraiserSignature, // Update the file path or signature data
//                'appraiser_date' => $this->appraiserDate,
            ]);
        } else {
            // If no comment exists for the current year, create a new record in the database
            $user->appraisalComments()->create([
                'comments' => $this->comments,
//                'appraiser_signature' => $this->appraiserSignature, // Store the file path or signature data
//                'appraiser_date' => $this->appraiserDate,
            ]);
        }

        // Reset form fields


        // Display a success message
        session()->flash('message', 'Appraisal comments submitted successfully.');
    }



}
