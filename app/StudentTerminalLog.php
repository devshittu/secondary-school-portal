<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentTerminalLog extends Model
{

    use SoftDeletes;
    protected $fillable = [Constants::RQ_USER_ID, Constants::DBC_CLASS_TERM_ID, Constants::DBC_ACAD_SESS_ID];

    // belongs to class term id
//    acad session

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
    public function class_term()
    {
        return $this->belongsTo('App\ClassTerm');
    }

    /**
     * Get the user_student_transition_log_subjects for the user/candidate.
     */
    public function student_terminal_log_subjects()
    {
        return $this->hasMany(StudentTerminalLogSubject::class);
    }
}
