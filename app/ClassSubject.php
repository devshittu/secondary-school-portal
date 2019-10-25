<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassSubject extends Model
{
    use SoftDeletes;
    protected $table = 'class_subject';

    /**
     * Get the user_student_transition_log_subjects for this model.
     */
    public function user_student_transition_log_subjects()
    {
        return $this->hasMany(UserStudentTransitionLogSubject::class);
    }
}
