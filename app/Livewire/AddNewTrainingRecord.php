<?php

namespace App\Livewire;

use App\Models\TrainingRecord;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddNewTrainingRecord extends Component
{
    public $institutions = [];

    public function mount(){
        $this->institutions[] = ['name' => '', 'date' => ''];
}

    public function submitForm()
    {
        // Validate the data
        $this->validate([
            'institutions.*.name' => 'required|string',
            'institutions.*.date' => 'required|date',
        ], [
            'institutions.*.name.required' => 'Institution name is required',
            'institutions.*.date.required' => 'Date is required',
            'institutions.*.date.date' => 'Date must be a valid date',
        ]);

        try {
            $user = Auth::user();

            // Begin a database transaction
            \DB::beginTransaction();
        foreach ($this->institutions as $institution) {
            TrainingRecord::create([
                'appraisee_id' => auth()->id(),
                'appraiser_id' => auth()->id(),
                'institution' => $institution['name'],
                'training_date' => $institution['date'],
            ]);
            // Dispatch the event here
            $this->dispatch('TrainingRecordCreated');
        }
        // Commit the database transaction
        \DB::commit();

        // Clear the form after submission
        $this->institutions = [];
        $this->institutions[] = ['name' => '', 'date' => ''];

        // Provide feedback to the user
        session()->flash('message', 'Training record added successfully');
        } catch (\Exception $e) {
            // Handle any database or other exceptions
            \DB::rollback(); // Rollback the transaction in case of an exception
            session()->flash('error', 'An error occurred while submitting the reviews');
        }
    }


    public function addBlankTrainingField()
    {
        $this->institutions[] = ['name' => '', 'date' => ''];
    }

    public function removeBlankTrainingField($index)
    {
        unset($this->institutions[$index]);
        $this->institutions = array_values($this->institutions); // Re-index the array
    }
    public function render()
    {
        return view('livewire.add-new-training-record');
    }
}
