<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PerformancePlan extends Model
{

    protected $fillable = [
        'key_result_area',
        'resource_required',
        'appraisee_id',
        'appraiser_id',
        'department_id',
        'appraisee_approve',
        'appraiser_approve',
    ];

    public function appraisee(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function appraiser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function targets()
    {
        return $this->hasMany(Target::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function midYearReview(): HasOne
    {
        return $this->hasOne(MidYearReview::class);
    }

    public function endOfYearReview(): HasOne
    {
        return $this->hasOne(EndOfYearReview::class);
    }


    use HasFactory;
}
