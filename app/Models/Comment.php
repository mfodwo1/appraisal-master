<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [

        'appraisee_comments',
        'hod_comments',

        'appraisee_sign',
        'hod_sign',

        'appraisee_sign_date',
        'hod_sign_date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
