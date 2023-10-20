<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualAppriasalCore extends Model
{
    protected $fillable = [
        'appraisee_id',
        'plan',
        'work',
        'manage',
        'organizational_change',
        'creativity',
        'thinking',
        'initiate_action',
        'accept_responsibility',
        'good_judgment',
        'development',
        'customer_satisfaction',
        'personnel_development',
        'communicate_decision',
        'negotiate',
        'network',
        'manual_skill',
        'cross_functional_awareness',
        'expertise',
        'team_work',
        'show_support',
        'adhere_principle',
        'inspire_other',
        'confidence',
        'manage_pressure',
        'accountability',
        'business_processes',
        'result_based_action',
    ];

    public function appraisee()
    {
        return $this->belongsTo(User::class, 'appraisee_id');
    }
}
