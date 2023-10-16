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
    ];

    public function target()
    {
        return $this->belongsTo(Target::class);
    }

    use HasFactory;
}
