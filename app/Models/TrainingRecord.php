<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'institution',
        'institution2',
        'institution3',
        'training_date',
        'training_date2',
        'training_date3',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
