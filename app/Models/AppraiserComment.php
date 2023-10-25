<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppraiserComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'appraiser_id',
        'appraisee_id',
        'comment',
        'appraiser_sign',
        'appraiser_sign_date',
        ];

    public function appraisercomment()
    {
        return $this->belongsTo(User::class);
    }
}
