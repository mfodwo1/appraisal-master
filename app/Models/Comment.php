<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appraiser_comments',
        'appraisee_comments',
        'hod_comments',
        'appraiser_sign',
        'appraisee_sign',
        'hod_sign',
        'appraiser_sign_date',
        'appraisee_sign_date',
        'hod_sign_date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
