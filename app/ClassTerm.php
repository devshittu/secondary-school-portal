<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassTerm extends Model
{
    //
    public function academic_class()
    {
        return $this->belongsTo('App\AcademicClass');
    }
    public function academic_term()
    {
        return $this->belongsTo('App\AcademicTerm');
    }
}
