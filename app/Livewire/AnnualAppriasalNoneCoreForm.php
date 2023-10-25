<?php

namespace App\Livewire;

use App\Models\AnnualAppriasalCore;
use App\Models\AnnualAppriasalNoneCore;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
class AnnualAppriasalNoneCoreForm extends Component
{
    #[Rule('required|integer')]
    public $developOther;
    #[Rule('required|integer')]
    public $provideGuidance;
    public $developOtherWeight = 0;
    public $provideGuidanceWeight = 0;
    public $developStaffTotal;
    public $developStaffAverage;

    #[Rule('required|integer')]
    public $selfDevelopment;
    #[Rule('required|integer')]
    public $supplementTraining;
    public $selfDevelopmentWeight = 0;
    public $supplementTrainingWeight = 0;
    public $DevelopmentAndTrainingTotal;
    public $DevelopmentAndTrainingAverage;

    #[Rule('required|integer')]
    public $customerSatisfaction;
    #[Rule('required|integer')]
    public $qualityService;
    public $customerSatisfactionWeight = 0;
    public $qualityServiceWeight =0;
    public $deliveringResultTotal;
    public $deliveringResultAverage;

    #[Rule('required|integer')]
    public $regulation;
    #[Rule('required|integer')]
    public $act;
    public $regulationWeight = 0;
    public $actWeight = 0;
    public $OrganisationalGoalsTotal;
    public $OrganisationalGoalsAverage;

    #[Rule('required|integer')]
    public $respect;
    #[Rule('required|integer')]
    public $commitmentToWork;
    public $respectWeight = 0;
    public $commitmentToWorkWeight = 0;
    public $respectAndCommitmentTotal;
    public $respectAndCommitmentAverage;

    #[Rule('required|integer')]
    public $functionInTeam;
    #[Rule('required|integer')]
    public $workInTeam;
    public $functionInTeamWeight = 0;
    public $workInTeamWeight = 0;
    public $WorkEffectivelyTotal;
    public $WorkEffectivelyAverage;

    public $averageOfaverages;

    public function render()
    {
        return view('livewire.annual-appriasal-none-core-form');
    }

    public function mount()
    {
        $userId = Auth::id();

        // Check if the user has already submitted a review for the current year
        $existingRecord = AnnualAppriasalNoneCore::where('appraisee_id', $userId)
            ->whereYear('created_at', now()->year)
            ->first();
        if ($existingRecord) {
            $this->developOther = $existingRecord->develop_other;
            $this->provideGuidance = $existingRecord->provide_guidance;
            $this->supplementTraining = $existingRecord -> self_development;
            $this->selfDevelopment = $existingRecord -> supplement_training;
            $this->customerSatisfaction = $existingRecord -> customer_satisfaction;
            $this->qualityService = $existingRecord -> quality_service;
            $this->regulation = $existingRecord -> regulation;
            $this->act = $existingRecord -> act;
            $this->respect = $existingRecord -> respect;
            $this->commitmentToWork = $existingRecord -> commitment_toWork;
            $this->functionInTeam = $existingRecord -> function_in_team;
            $this->workInTeam = $existingRecord -> work_in_team;

            $this->calculateNoneCoreCompetencies();
        }

    }

    public function calculateNoneCoreCompetencies()
    {
        $totalWeight = 2;
//        (xi) Ability to Develop Staff.
        $this->developOtherWeight = $this->developOther * 0.3;
        $this->provideGuidanceWeight = $this->provideGuidance  * 0.3;
        $this->developStaffTotal = $this->developOtherWeight + $this->provideGuidanceWeight;
        $this->developStaffAverage = number_format(($this->developStaffTotal / $totalWeight),3);

//        (xii) Commitment to Own Personal Development and Training
        $this->selfDevelopmentWeight = $this->selfDevelopment * 0.3;
        $this->supplementTrainingWeight = $this->supplementTraining  * 0.3;
        $this->DevelopmentAndTrainingTotal = $this->selfDevelopmentWeight + $this->supplementTrainingWeight;
        $this->DevelopmentAndTrainingAverage = number_format(($this->DevelopmentAndTrainingTotal / $totalWeight),3);

//        (viii) Delivering Results and Ensuring Customer Satisfaction
        $this->customerSatisfactionWeight = $this->customerSatisfaction * 0.3;
        $this->qualityServiceWeight =$this->qualityService  * 0.3;
        $this->deliveringResultTotal = $this->customerSatisfactionWeight + $this->qualityServiceWeight;
        $this->deliveringResultAverage = number_format(($this->deliveringResultTotal / $totalWeight),3);

//        (xiv) Following Instructions and Working Towards Organisational Goals:
        $this->regulationWeight = $this->regulation * 0.3;
        $this->actWeight =$this->act * 0.3;
        $this->OrganisationalGoalsTotal = $this->regulationWeight + $this->actWeight;
        $this->OrganisationalGoalsAverage =  number_format(($this->OrganisationalGoalsTotal / $totalWeight),3);

//        (xv) Respect and Commitment
        $this->respectWeight = $this->respect * 0.3;
        $this->commitmentToWorkWeight = $this->commitmentToWork * 0.3;
        $this->respectAndCommitmentTotal = $this->respectWeight + $this->commitmentToWorkWeight;
        $this->respectAndCommitmentAverage =  number_format(($this->respectAndCommitmentTotal / $totalWeight),3);

        //        (xvi) Ability to Work Effectively in a Team
        $this->functionInTeamWeight = $this->functionInTeam * 0.3;
        $this->workInTeamWeight = $this->workInTeam * 0.3;
        $this->WorkEffectivelyTotal = $this->functionInTeamWeight + $this->workInTeamWeight;
        $this->WorkEffectivelyAverage = number_format(($this->WorkEffectivelyTotal / $totalWeight),3);


        $totalItems = 6;
        $this->averageOfaverages = number_format(( $this->developStaffAverage +
                                                    $this->DevelopmentAndTrainingAverage +
                                                    $this->deliveringResultAverage +
                                                    $this->OrganisationalGoalsAverage +
                                                    $this->respectAndCommitmentAverage +
                                                    $this->WorkEffectivelyAverage ) / $totalItems,3);
    }

    public function submitForm()
    {
//        try {
            $validated = $this->validate();
            $user = Auth::user();
            // Begin a database transaction
            \DB::beginTransaction();

            // Check if the user has already submitted a review for the current year
            $existingRecord = AnnualAppriasalNoneCore::where('appraisee_id', $user->id)
                ->whereYear('created_at', now()->year)
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

            if ($existingRecord) {
                // If a record for the current year exists, update it
                $existingRecord->update([
                    'develop_other'=> $validated['developOther'],
                    'provide_guidance' => $validated['provideGuidance'],
                    'self_development' => $validated['supplementTraining'],
                    'supplement_training' => $validated['selfDevelopment'],
                    'customer_satisfaction' => $validated['customerSatisfaction'],
                    'quality_service' => $validated['qualityService'],
                    'regulation' => $validated['regulation'],
                    'act' => $validated['act'],
                    'respect' => $validated['respect'],
                    'commitment_toWork' => $validated['commitmentToWork'],
                    'function_in_team' => $validated['functionInTeam'],
                    'work_in_team' => $validated['workInTeam'],
                ]);
            } else {
                // If no record for the current year exists, create a new one
                $annualAppriasalCore = AnnualAppriasalNoneCore::create([
                    'appraisee_id' => Auth::id(),
                    'appraiser_id' => $appraiserId,
                    'develop_other'=> $validated['developOther'],
                    'provide_guidance' => $validated['provideGuidance'],
                    'self_development' => $validated['supplementTraining'],
                    'supplement_training' => $validated['selfDevelopment'],
                    'customer_satisfaction' => $validated['customerSatisfaction'],
                    'quality_service' => $validated['qualityService'],
                    'regulation' => $validated['regulation'],
                    'act' => $validated['act'],
                    'respect' => $validated['respect'],
                    'commitment_toWork' => $validated['commitmentToWork'],
                    'function_in_team' => $validated['functionInTeam'],
                    'work_in_team' => $validated['workInTeam'],
                ]);
            }
            // Commit the database transaction
            \DB::commit();

            // Clear form input values
            $this->reset(
                'developOther',
                        'provideGuidance',
                        'supplementTraining',
                        'selfDevelopment',
                        'customerSatisfaction',
                        'qualityService',
                        'regulation',
                        'act',
                        'respect',
                        'commitmentToWork',
                        'functionInTeam',
                        'workInTeam',
            );


            session()->flash('success', 'Form submitted successfully.');
//        }catch (\Exception $e) {
//            // Handle any database or other exceptions
//            \DB::rollback(); // Rollback the transaction in case of an exception
//            session()->flash('error', 'An error occurred while submitting the reviews');
//        }
    }



}
