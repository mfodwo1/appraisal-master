<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MidYearReview extends Model
{
    protected $fillable = [
        'targets_progress_review',
        'targets_remarks',
        'appraisee_id',
        'appraiser_id',

    ];

    public function appraiser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'appraisee_id');
    }




    use HasFactory;
}
