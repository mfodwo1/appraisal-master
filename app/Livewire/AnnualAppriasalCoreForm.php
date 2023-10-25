<?php

namespace App\Livewire;

use App\Models\AnnualAppriasalCore;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AnnualAppriasalCoreForm extends Component
{
    public $plan;
    public $work;
    public $manage;
    public $plan_weight = 0;
    public $work_weight = 0;
    public $manage_weight = 0;
    public $organization_management_total;
    public $organization_management_average;


    public $change;
    public $creativity;
    public $thinking;
    public $change_weight = 0;
    public $creativity_weight = 0;
    public $thinking_weight = 0;
    public $decision_making_total;
    public $decision_making_average;



    public $direction;
    public $decision_making;
    public $judgment;
    public $direction_weight = 0;
    public $decision_making_weight = 0;
    public $judgment_weight = 0;
    public $innovation_total;
    public $innovation_average;


    public $organizationDevelopment;
    public $satisfaction;
    public $personnelDevelopment;
    public $organizationDevelopmentWeight = 0;
    public $satisfactionWeight = 0;
    public $personnelDevelopmentWeight = 0;
    public $developingTotal;
    public $developingAverage;


    public $communicateDecision;
    public $negotiate;
    public $network;
    public $communicateDecisionWeight = 0;
    public $negotiateWeight = 0;
    public $networkWeight = 0;
    public $communicationTotal;
    public $communication_average;


    public $manualSkill;
    public $crossFunctionalAwareness;
    public $expertise;
    public $manualSkillWeight = 0;
    public $crossFunctionalAwarenessWeight = 0;
    public $expertiseWeight = 0;
    public $technicalSkillsTotal;
    public $technicalSkillsAverage;


    public $teamWork;
    public $showSupport;
    public $adherePrinciple;
    public $teamWorkWeight = 0;
    public $showSupportWeight = 0;
    public $adherePrincipleWeight = 0;
    public $cooperatingTotal;
    public $cooperatingAverage;


    public $inspireOther;
    public $confidence;
    public $managePressure;
    public $inspireOtherWeight = 0;
    public $confidenceWeight = 0;
    public $managePressureWeight = 0;
    public $maintainingProductivityTotal;
    public $maintainingProductivityAverage;


    public $accountability;
    public $businessProcesses;
    public $resultBasedAction;
    public $accountabilityWeight = 0;
    public $businessProcessesWeight = 0;
    public $resultBasedActionWeight = 0;
    public $savingcostTotal;
    public $savingcostAverage;

    public $averageOfaverages;


    public function render()
    {
        return view('livewire.annual-appriasal-core-form');
    }

    public function mount()
    {
//        $user = Auth::user();
//        $currentYear = now()->year;
        // Get the currently authenticated user's ID
        $userId = Auth::id();

        // Check if the user has already submitted a review for the current year
        $existingRecord = AnnualAppriasalCore::where('appraisee_id', $userId)
            ->whereYear('created_at', now()->year)
            ->first();

//        // Check if the user has already submitted a form for the current year
//        $existingRecord = $user->appraisee()
//            ->whereYear('created_at', $currentYear)
//            ->first();

        if ($existingRecord) {

            // If a record for the current year exists, populate form fields with its data
            $this->plan = $existingRecord->plan;
            $this->work = $existingRecord->work;
            $this->manage = $existingRecord->manage;

            $this->change = $existingRecord->organizational_change;
            $this->creativity = $existingRecord->creativity;
            $this->thinking = $existingRecord->thinking;

            $this->direction= $existingRecord->initiate_action;
            $this->decision_making = $existingRecord->accept_responsibility;
            $this->judgment = $existingRecord->good_judgment;

            $this->organizationDevelopment =$existingRecord->development;
            $this->satisfaction =$existingRecord->customer_satisfaction;
            $this->personnelDevelopment =$existingRecord->personnel_development;

            $this->communicateDecision =$existingRecord->communicate_decision;
            $this->negotiate =$existingRecord->negotiate;
            $this->network =$existingRecord->network;

            $this->manualSkill =$existingRecord->manual_skill;
            $this->crossFunctionalAwareness =$existingRecord->cross_functional_awareness;
            $this->expertise =$existingRecord->expertise;

            $this->teamWork =$existingRecord->team_work;
            $this->showSupport =$existingRecord->show_support;
            $this->adherePrinciple =$existingRecord->adhere_principle;

            $this->inspireOther =$existingRecord->inspire_other;
            $this->confidence =$existingRecord->confidence;
            $this->managePressure =$existingRecord->manage_pressure;

            $this->accountability =$existingRecord->accountability;
            $this->businessProcesses =$existingRecord->business_processes;
            $this->resultBasedAction =$existingRecord->result_based_action;
            $this->calculateCoreCompetencies();
        }
    }

    public function calculateCoreCompetencies()
    {
        // Calculate the values for Organization and Management
        $this->plan_weight = $this->plan * 0.3;
        $this->work_weight = $this->work * 0.3;
        $this->manage_weight = $this->manage * 0.3;
        $this->organization_management_total = $this->plan_weight + $this->work_weight + $this->manage_weight;
        $this->organization_management_average = number_format(($this->organization_management_total / 3), 3);

        // Calculate the values for Innovation and Strategic Thinking
        $this->change_weight = $this->change * 0.3;
        $this->creativity_weight = $this->creativity * 0.3;
        $this->thinking_weight = $this->thinking * 0.3;
        $this->innovation_total = $this->change_weight + $this->creativity_weight + $this->thinking_weight;
        $this->innovation_average = number_format(($this->innovation_total / 3), 3);

        //Leadership and decision-making
        $this->direction_weight = $this->direction * 0.3;
        $this->decision_making_weight = $this->decision_making * 0.3;
        $this->judgment_weight = $this->judgment * 0.3;
        $this->decision_making_total = $this->direction_weight + $this->decision_making_weight + $this->judgment_weight;
        $this->decision_making_average = number_format(($this->decision_making_total / 3), 3);

        //Developing and Improving
        $this->organizationDevelopmentWeight = $this->organizationDevelopment * 0.3;
        $this->satisfactionWeight = $this->satisfaction * 0.3;
        $this->personnelDevelopmentWeight = $this->personnelDevelopment * 0.3;
        $this->developingTotal = $this->organizationDevelopmentWeight + $this->satisfactionWeight +  $this->personnelDevelopmentWeight;
        $this->developingAverage = number_format(($this->developingTotal / 3),3);

//        Communication (oral, written & electronic)
        $this->communicateDecisionWeight = $this->communicateDecision * 0.3;
        $this->negotiateWeight =  $this->negotiate * 0.3;
        $this->networkWeight = $this->network * 0.3;
        $this->communicationTotal = $this->communicateDecisionWeight + $this->negotiateWeight + $this->networkWeight;
        $this->communication_average = number_format(($this->communicationTotal / 3),3);

//      Job Knowledge and Technical Skills
        $this->manualSkillWeight = $this->manualSkill * 0.3;
        $this->crossFunctionalAwarenessWeight = $this->crossFunctionalAwareness * 0.3;
        $this->expertiseWeight = $this->expertise * 0.3;
        $this->technicalSkillsTotal = $this->manualSkillWeight + $this->crossFunctionalAwarenessWeight + $this->expertiseWeight ;
        $this->technicalSkillsAverage = number_format(($this->technicalSkillsTotal / 3),3);

//      Supporting and Cooperating
        $this->teamWorkWeight= $this->teamWork * 0.3;
        $this->showSupportWeight= $this->showSupport * 0.3;
        $this->adherePrincipleWeight= $this->adherePrinciple * 0.3;
        $this->cooperatingTotal =  $this->teamWorkWeight + $this->showSupportWeight +  $this->adherePrincipleWeight;
        $this->cooperatingAverage = number_format(($this->cooperatingTotal/ 3),3);

//        Maximising and maintaining Productivity
        $this->inspireOtherWeight = $this->inspireOther *0.3;
        $this->confidenceWeight = $this->confidence *0.3;
        $this->managePressureWeight = $this->managePressure *0.3;
        $this->maintainingProductivityTotal =  $this->inspireOtherWeight + $this->confidenceWeight +  $this->managePressureWeight;
        $this->maintainingProductivityAverage =  number_format(($this->maintainingProductivityTotal / 3),3);

//        Developing / Managing budgets and saving cost:
        $this->accountabilityWeight = $this->accountability * 0.3;
        $this->businessProcessesWeight = $this->businessProcesses * 0.3;
        $this->resultBasedActionWeight = $this->resultBasedAction * 0.3;
        $this->savingcostTotal = $this->accountabilityWeight +  $this->businessProcessesWeight + $this->resultBasedActionWeight;
        $this->savingcostAverage = number_format(($this->savingcostTotal / 3),3);

//        Calculate the over all average of all the averages
        $totalAccessment = 9;
        $this->averageOfaverages = number_format((($this->organization_management_average
                                    + $this->innovation_average
                                    + $this->decision_making_average
                                    + $this->developingAverage
                                    + $this->communication_average
                                    + $this->technicalSkillsAverage
                                    + $this->cooperatingAverage
                                    + $this->maintainingProductivityAverage
                                    + $this->savingcostAverage)/$totalAccessment),3);
    }

    public function submitForm()
    {

            $this->validate([
                'plan' => 'required|integer',
                'work' => 'required|integer',
                'manage' => 'required|integer',
                'change' => 'required|integer',
                'creativity' => 'integer',
                'thinking' => 'integer',
                'direction' => 'required|integer',
                'decision_making' => 'required|integer',
                'judgment' => 'required|integer',
                'organizationDevelopment' => 'required|integer',
                'satisfaction' => 'required|integer',
                'personnelDevelopment' => 'required|integer',
                'communicateDecision' => 'required|integer',
                'negotiate' => 'required|integer',
                'network' => 'required|integer',
                'manualSkill' => 'required|integer',
                'crossFunctionalAwareness' => 'required|integer',
                'expertise' => 'required|integer',
                'teamWork' => 'required|integer',
                'showSupport' => 'required|integer',
                'adherePrinciple' => 'required|integer',
                'inspireOther' => 'required|integer',
                'confidence' => 'required|integer',
                'managePressure' => 'required|integer',
                'accountability' => 'required|integer',
                'businessProcesses' => 'required|integer',
                'resultBasedAction' => 'required|integer',
            ]);

        try {
            $userId = Auth::id();
            $user = Auth::user();
            // Begin a database transaction
            \DB::beginTransaction();

            // Check if the user has already submitted a review for the current year
            $existingRecord = AnnualAppriasalCore::where('appraisee_id', $userId)
                ->whereYear('created_at', now()->year)
                ->first();

            //Fetch user's appraisee
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
                    'plan' => $this->plan,
                    'work' => $this->work,
                    'manage' => $this->manage,
                    'organizational_change' => $this->change,
                    'creativity' => $this->creativity,
                    'thinking' => $this->thinking,
                    'initiate_action' => $this->direction,
                    'accept_responsibility' => $this->decision_making,
                    'good_judgment' => $this->judgment,
                    'development' => $this->organizationDevelopment,
                    'customer_satisfaction' => $this->satisfaction,
                    'personnel_development' => $this->personnelDevelopment,
                    'communicate_decision' => $this->communicateDecision,
                    'negotiate' => $this->negotiate,
                    'network' => $this->network,
                    'manual_skill' => $this->manualSkill,
                    'cross_functional_awareness' => $this->crossFunctionalAwareness,
                    'expertise' => $this->expertise,
                    'team_work' => $this->teamWork,
                    'show_support' => $this->showSupport,
                    'adhere_principle' => $this->adherePrinciple,
                    'inspire_other' => $this->inspireOther,
                    'confidence' => $this->confidence,
                    'manage_pressure' => $this->managePressure,
                    'accountability' => $this->accountability,
                    'business_processes' => $this->businessProcesses,
                    'result_based_action' => $this->resultBasedAction,
                ]);
            } else {
                // If no record for the current year exists, create a new one
                $annualAppriasalCore = AnnualAppriasalCore::create([
                    'appraisee_id' => Auth::id(),
                    'appraiser_id' => $appraiserId,
                    'plan' => $this->plan,
                    'work' => $this->work,
                    'manage' => $this->manage,
                    'organizational_change' => $this->change,
                    'creativity' => $this->creativity,
                    'thinking' => $this->thinking,
                    'initiate_action' => $this->direction,
                    'accept_responsibility' => $this->decision_making,
                    'good_judgment' => $this->judgment,
                    'development' => $this->organizationDevelopment,
                    'customer_satisfaction' => $this->satisfaction,
                    'personnel_development' => $this->personnelDevelopment,
                    'communicate_decision' => $this->communicateDecision,
                    'negotiate' => $this->negotiate,
                    'network' => $this->network,
                    'manual_skill' => $this->manualSkill,
                    'cross_functional_awareness' => $this->crossFunctionalAwareness,
                    'expertise' => $this->expertise,
                    'team_work' => $this->teamWork,
                    'show_support' => $this->showSupport,
                    'adhere_principle' => $this->adherePrinciple,
                    'inspire_other' => $this->inspireOther,
                    'confidence' => $this->confidence,
                    'manage_pressure' => $this->managePressure,
                    'accountability' => $this->accountability,
                    'business_processes' => $this->businessProcesses,
                    'result_based_action' => $this->resultBasedAction,
                ]);
            }
            // Commit the database transaction
            \DB::commit();


            // Clear form input values
            $this->plan = null;
            $this->work = null;
            $this->manage = null;
            $this->change = null;
            $this->creativity = null;
            $this->thinking = null;
            $this->direction = null;
            $this->decision_making = null;
            $this->judgment = null;

            session()->flash('success', 'Form submitted successfully.');
        }catch (\Exception $e) {
            // Handle any database or other exceptions
            \DB::rollback(); // Rollback the transaction in case of an exception
            session()->flash('error', 'An error occurred while submitting the reviews');
        }
    }

}



