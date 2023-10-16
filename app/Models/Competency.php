<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competency extends Model
{

    protected $fillable = [
        'user_id',
        'competency',
        'competency_progress_review',
        'competency_remarks',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

//    use HasFactory;
}
