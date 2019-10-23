<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassStaff extends Model
{

    protected $table = 'class_staff';
    /**
     * Get the user_student_transition_log_subjects for this model.
     */
    public function user_staff_profile()
    {
        return $this->belongsTo('\App\UserStaffProfile');
    }

    /**
     * Get the academic sessions for the user/candidate.
     */
    public function academic_session()
    {
        return $this->belongsTo('App\AcademicSession');
    }

    /**
     * Get the academic sessions for the user/candidate.
     */
    public function academic_class()
    {
        return $this->belongsTo('App\AcademicClass');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
