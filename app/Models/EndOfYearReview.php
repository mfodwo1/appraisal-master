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
        'performance_assessment',
    ];

    public function target()
    {
        return $this->belongsTo(Target::class);
    }

    public function appraisee()
    {
        return $this->belongsTo(User::class, 'appraisee_id');
    }

    use HasFactory;
}
