<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassStaff extends Model
{

    use SoftDeletes;

    protected $fillable = [Constants::DBC_ACAD_CLASS_ID, Constants::DBC_ACAD_SESS_ID, Constants::DBC_USER_ID];
    protected $table = 'class_staff';
    /**
     * Get the user_student_transition_log_subjects for this model.
     */
    public function user_staff_profile()
    {
        return $this->belongsTo('\App\UserStaffProfile', 'user_id', 'user_id');
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
