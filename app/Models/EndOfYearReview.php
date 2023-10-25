<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndOfYearReview extends Model
{

    protected $fillable = [
        'targets_id',
        'score',
        'comment',
        'appraisee_id',
        'appraiser_id',
        'performance_assessment',
    ];

    public function target()
    {
        return $this->belongsTo(Target::class);
    }

    public function appraisee()
    {
        return $this->belongsTo(User::class);
    }
    public function appraiser()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
