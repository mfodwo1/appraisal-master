<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


//implements MustVerifyEmail
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'staff_id',
        'email',
        'password',
        'name',
        'user_type',
        'first_name',
        'other_names',
        'surname',
        'title',
        'gender',
        'grade_salary',
        'present_job_title',
        'date_of_appointment',
        'department_id',
        'user_type',
        'current_team_id',
        'profile_photo_path',
        'signature',
    ];



    public function nonecaoreappraisee()
    {
        return $this->hasOne(AnnualAppriasalNoneCore::class);
    }
    public function appraisee()
    {
        return $this->hasOne(AnnualAppriasalCore::class);
    }
    public function midYearReviews(): HasMany
    {
        return $this->hasMany(MidYearReview::class);
    }

    public function endofyearreviews(): HasMany
    {
        return $this->hasMany(EndOfYearReview::class);
    }
    public function trainingRecords(): HasOne
    {
        return $this->hasOne(TrainingRecord::class);
    }

    public function Comment(): HasOne
    {
        return $this->hasOne(Comment::class);
    }

    public function performancePlanningForm(): HasOne
    {
        return $this->hasOne(PerformancePlanningForm::class);
    }

    public function performancePlan(): HasMany
    {
        return $this->hasMany(PerformancePlan::class);
    }

    public function competency(): HasMany
    {
        return $this->hasMany(Competency::class);
    }





    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
