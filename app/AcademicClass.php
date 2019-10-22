<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    protected $table = 'academic_classes';
    protected $fillable = [];





    protected $hidden = [];

    public function term()
    {
        return $this->hasMany(ClassTerm::class, Constants::DBC_ACAD_CLASS_ID, 'id');
    }

    public function user_candidate_profiles()
    {
        return $this->hasMany(UserCandidateProfile::class);
    }

    public function academic_subjects()
    {
        return $this->belongsToMany('App\AcademicSubject');
    }

}
