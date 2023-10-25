<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualAppriasalNoneCore extends Model
{
    protected $fillable=[
        'appraisee_id',
        'appraiser_id',
        'develop_other',
        'provide_guidance',
        'self_development',
        'supplement_training',
        'customer_satisfaction',
        'quality_service',
        'regulation',
        'act',
        'respect',
        'commitment_toWork',
        'function_in_team',
        'work_in_team',
    ];

    public function nonecoreappraisee()
    {
        return $this->belongsTo(User::class);
    }

    public function nonecoreappraiser()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
