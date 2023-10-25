<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competency extends Model
{

    protected $fillable = [
        'appraisee_id',
        'appraiser_id',
        'competency',
        'competency_progress_review',
        'competency_remarks',
    ];

    public function appraisee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'appraisee_id');
    }
    public function appraiser()
    {
        return $this->belongsTo(User::class, 'appraiser_id');
    }

//    use HasFactory;
}
