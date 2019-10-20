<?php

namespace App;

use App\Http\Traits\FullTextSearch;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable, FullTextSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'reg_code', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the candidate record associated with the user if it is candidate .
     */
    public function candidate_profile()
    {
        return $this->hasOne('App\UserCandidateProfile');
    }

    /**
     * Get the admin record associated with the user if it is admin.
     */
    public function admin_profile()
    {
        return $this->hasOne('App\UserAdminProfile');
    }
    /**
     * Get the student record associated with the user if it is student .
     */
    public function student_profile()
    {
        return $this->hasOne('App\UserStudentProfile');
    }
    /**
     * Get the staff record associated with the user if it is staff .
     */
    public function staff_profile()
    {
        return $this->hasOne('App\UserStaffProfile');
    }
}
