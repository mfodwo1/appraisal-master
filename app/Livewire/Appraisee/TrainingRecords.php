<?php

namespace App\Livewire\Appraisee;

use App\Models\TrainingRecord;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;


class TrainingRecords extends Component
{
    public $institutions = [];
    public $editedInstitution = [
        'name' => '',
        'date' => '',
    ];
    public $editIndex = null;

    protected $listeners = [
        'TrainingRecordCreated' => 'refreshTrainingRecords',
    ];
    public function refreshTrainingRecords(){
        $this->updateInstitutions();
    }

    public function mount()
    {
        $this->updateInstitutions();
    }

    public function submitForm()
    {
        // Validation rules for edited institution
        $rules = [
            'editedInstitution.name' => 'required|string|max:255',
            'editedInstitution.date' => 'required|date',
        ];

        // Custom validation messages (optional)
        $messages = [
            'editedInstitution.name.required' => 'The institution name is required.',
            'editedInstitution.date.required' => 'The date is required.',
        ];

        $validator = Validator::make($this->editedInstitution, $rules, $messages);

        if ($validator->fails()) {
            $this->addError('editedInstitution.name', $validator->errors()->first('editedInstitution.name'));
            $this->addError('editedInstitution.date', $validator->errors()->first('editedInstitution.date'));
        } else {
            $this->saveEditedInstitution();
        }

    }

    public function saveEditedInstitution()
    {
        try {
            if ($this->editIndex !== null) {
                TrainingRecord::where('id', $this->institutions[$this->editIndex]['id'])->update([
                    'institution' => $this->editedInstitution['name'],
                    'training_date' => $this->editedInstitution['date'],
                ]);
                $this->editIndex = null;
                $this->updateInstitutions();
            }
            // Commit the database transaction
            \DB::commit();

            // Provide feedback to the user
            session()->flash('message', 'Training record added successfully');
        } catch (\Exception $e) {
            // Handle any database or other exceptions
            \DB::rollback(); // Rollback the transaction in case of an exception
            session()->flash('error', 'An error occurred while submitting the reviews');
        }
    }

    public function editInstitution($index)
    {
        $this->editIndex = $index;
        $this->editedInstitution = [
            'name' => $this->institutions[$index]['institution'],
            'date' => $this->institutions[$index]['training_date'],
        ];
    }

    public function cancelEdit()
    {
        $this->editIndex = null;
    }

    public function removeInstitution($index)
    {
        TrainingRecord::where('id', $this->institutions[$index]['id'])->delete();
        $this->updateInstitutions();
    }

    public function addInstitution()
    {
        $this->validate([
            'editedInstitution.name' => 'required|string|max:255',
            'editedInstitution.date' => 'required|date',
        ]);

        TrainingRecord::create([
            'appraisee_id' => auth()->id(),
            'appraiser_id' => auth()->id(),
            'institution' => $this->editedInstitution['name'],
            'training_date' => $this->editedInstitution['date'],
        ]);

        $this->editedInstitution = ['name' => '', 'date' => ''];

        $this->updateInstitutions();

    }

    public function updateInstitutions()
    {
        $this->institutions = TrainingRecord::where('appraisee_id', auth()->id())->get();
    }


    public function render()
    {
        return view('livewire.appraisee.training-records');
    }
}
