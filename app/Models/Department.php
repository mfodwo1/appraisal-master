<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name',
        'appraiser_id',
        'hod_id',
    ];

    public function appraiser()
    {
        return $this->belongsTo(User::class, 'appraiser_id');
    }
    public function department()
    {
        return $this->hasOne(User::class, );
    }

    public function hod()
    {
        return $this->belongsTo(User::class, 'hod_id');
    }

    public function performancePlans()
    {
        return $this->hasMany(PerformancePlan::class);
    }


}
