<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicSubject extends Model
{

    public function academic_classes()
    {
        return $this->belongsToMany('App\AcademicClass');
    }
}
