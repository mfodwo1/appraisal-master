<?php

namespace App\Livewire;

use Livewire\Component;

class TrainingRecords extends Component
{
    public $institution;
    public $institution2;
    public $institution3;
    public $trainingDate;
    public $trainingDate2;
    public $trainingDate3;
    public $trainingRecord;

    public function mount()
    {
        // Fetch the user's existing training record, if it exists
        $this->trainingRecord = auth()->user()->trainingRecords()->whereYear('created_at', now()->year)->first();

        // Pre-fill the form fields if a record exists
        if ($this->trainingRecord) {
            $this->institution = $this->trainingRecord->institution;
            $this->trainingDate = date('Y-m-d', strtotime($this->trainingRecord->training_date));
            $this->institution2 = $this->trainingRecord->institution2;
            $this->trainingDate2 = date('Y-m-d', strtotime($this->trainingRecord->training_date2));
            $this->institution3 = $this->trainingRecord->institution3;
            $this->trainingDate3 = date('Y-m-d', strtotime($this->trainingRecord->training_date3));

        }
    }

    public function submitForm()
    {
        // Validate the form data
        $this->validate([
            'institution' => 'required|string|max:255',
            'institution2' => 'nullable|string|max:255',
            'institution3' => 'nullable|string|max:255',
            'trainingDate' => 'required|date',
            'trainingDate2' => 'nullable|date',
            'trainingDate3' => 'nullable|date',
        ]);


        // Find the authenticated user
        $user = auth()->user();

        // Check if the user already has a training record for the current year
        $existingRecord = $user->trainingRecords()->whereYear('created_at', now()->year)->first();

        if ($existingRecord) {
            // Update the existing record
            $existingRecord->update([
                'institution' => $this->institution,
                'institution2' => $this->institution2,
                'institution3' => $this->institution3,
                'training_date' => $this->trainingDate,
                'training_date2' => $this->trainingDate2,
                'training_date3' => $this->trainingDate3,
            ]);
        } else {
            // Create a new record
            $user->trainingRecords()->create([
                'institution' => $this->institution,
                'institution2' => $this->institution2,
                'institution3' => $this->institution3,
                'training_date' => $this->trainingDate,
                'training_date2' => $this->trainingDate2,
                'training_date3' => $this->trainingDate3,
            ]);
        }


        // Optionally, you can emit an event or display a success message here
        session()->flash('success', 'Training record submitted successfully!');
    }

    public function render()
    {
        return view('livewire.appraisee.training-records');
    }
}
