<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;


class PersonalDetailsForm extends Component
{
    use withfileuploads;
    public $showForm = false;

    public $title;
    public $surname;
    public $firstName;
    public $otherNames;
    public $gender;
    public $gradeSalary;
    public $jobTitlePosition;
    public $dateOfAppointment;
    public $signature;
    public $userSignature;


    public function mount()
    {
        // Fetch the authenticated user
        $user = auth()->user();


        // Pre-fill the form fields with the user's data if it exists
        if ($user) {
            $this->title = $user->title;
            $this->surname = $user->surname;
            $this->firstName = $user->first_name;
            $this->otherNames = $user->other_names;
            $this->gender = $user->gender;
            $this->gradeSalary = $user->grade_salary;
            $this->jobTitlePosition = $user->present_job_title;
            $this->userSignature = $user->signature;

            // Check and format the date_of_appointment if not empty
            if ($user->date_of_appointment) {
                $this->dateOfAppointment = Carbon::parse($user->date_of_appointment)->format('Y-m-d');
            } else {
                $this->dateOfAppointment = null;
            }
        }
    }
    public function toggleForm(): void
    {
        $this->showForm = !$this->showForm;
    }
    //validate inputs
    public function submit()
    {
        if($this->signature){
             $filePath = $this->signature->store('uploads', 'public');
        }
        $this->validate([
            // Add validation rules for each form field
            'title' => 'required',
            'surname' => 'required',
            'firstName' => 'required',
            'otherNames'=> 'required',
            'gender' => 'required',
            'gradeSalary' => 'required',
            'jobTitlePosition' => 'required',
            'dateOfAppointment' => 'required|date',
            'signature'=> 'nullable|max:1024|image',
        ]);

        // Associate the user ID with the submitted profile data
        if (Auth::check()) {
            $user = Auth::user();
            // Attempt to update the user profile record in the database
//            try {
                $user->update([
                    'title' => $this->title,
                    'surname' => $this->surname,
                    'first_name' => $this->firstName,
                    'other_names' => $this->otherNames,
                    'gender' => $this->gender,
                    'grade_salary' => $this->gradeSalary,
                    'present_job_title' => $this->jobTitlePosition,
//                    'department_division' => $this->departmentDivision,
                    'date_of_appointment' => $this->dateOfAppointment,
                ]);
                if ($this->signature){
                    $user->update(['signature' => $filePath,]);
                }



                // Display a success message
                session()->flash('message', 'Profile updated successfully.');
//            } catch (\Exception $e) {
//                // Handle exceptions and display an error message
//                session()->flash('error', 'An error occurred while updating the profile: ' . $e->getMessage());
//            }
        } else {
            // Handle the case where the user profile is not found
            session()->flash('error', 'User profile not found.');
        }
    }
    public function render()
    {
        return view('livewire.personal-details-form');
    }
}
