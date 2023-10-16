<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Target extends Model
{
    protected $fillable = ['target', 'performance_plan_id',];

    public function performancePlan(): BelongsTo
    {
        return $this->belongsTo(PerformancePlan::class, 'performance_plan_id');
    }

    public function midyearreview(): BelongsTo
    {
        return $this->belongsTo(MidYearReview::class);
    }


    use HasFactory;
}
