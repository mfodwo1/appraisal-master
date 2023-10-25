<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'appraisee_id',
        'appraiser_id',
        'institution',
        'training_date',
    ];

    public function trainingRecords(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
