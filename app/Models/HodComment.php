<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HodComment extends Model
{
    use HasFactory;

    protected $fillable=[
        'hod_id',
        'hod_comments',
        'hod_signed',
        'hod_sign_date',
];

    public function hod()
    {
        return $this->belongsTo(User::class, 'hod_id');
    }
}
