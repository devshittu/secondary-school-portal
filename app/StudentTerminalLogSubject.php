<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentTerminalLogSubject extends Model
{
    use SoftDeletes;
    /**
     * Get the user_student_transition_log for the user.
     */
    public function student_terminal_log()
    {
        return $this->belongsTo('App\StudentTerminalLog');
    }
    /**
     * Get the academic sessions for the user/candidate.
     */
    public function class_subject()
    {
        return $this->belongsTo('App\ClassSubject');
    }
    /**
     * Get the academic sessions for the user/candidate.
     */
    public function academic_subject()
    {
        return $this->belongsTo('App\AcademicSubject');
    }

    /**
     * Get the total of continous accessment.
     *
     * @return string
     */
    public function getCATotalAttribute()
    {
        return $this->ca_test_score + $this->ca_exam_score;
    }
    /**
     * Get the total of continous accessment.
     *
     * @return string
     */
    public function getTotalAttribute()
    {
        return $this->ca_test_score + $this->ca_exam_score;
    }
}
