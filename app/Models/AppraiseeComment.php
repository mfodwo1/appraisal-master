<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppraiseeComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appraiser_id',
        'appraisee_id',
        'comment',
        'appraisee_sign',
        'appraisee_sign_date',
    ];

    public function appraisee()
    {
        return $this->belongsTo(User::class, 'appraisee_id');
    }
}
