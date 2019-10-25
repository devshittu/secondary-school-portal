<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassTerm extends Model
{
    use SoftDeletes;
    //
    public function academic_class()
    {
        return $this->belongsTo('App\AcademicClass');
    }
    public function academic_term()
    {
        return $this->belongsTo('App\AcademicTerm');
    }
    public function student_terminal_log()
    {
        return $this->belongsTo('App\StudentTerminalLog');
    }
}
