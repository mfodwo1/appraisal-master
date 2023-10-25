<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformancePlanningForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_result_area',
        'target_1',
        'target_2',
        'target_3',
        'target_4',
        'target_5',
        'resource_required',
        'appraisee_id',
        'appraiser_id',
        'targets_progress_review',
        'targets_remarks',
        'competency',
        'competency_progress_review',
        'competency_remarks',
        'performance_assessment',
        'score',
        'comment',
        'appraisee_approve',
        'appraiser_approve',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
