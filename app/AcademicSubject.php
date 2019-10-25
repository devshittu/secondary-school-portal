<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicSubject extends Model
{
    use SoftDeletes;

    public function academic_classes()
    {
        return $this->belongsToMany('App\AcademicClass');
    }
}
