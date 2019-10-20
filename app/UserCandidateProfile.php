<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class UserCandidateProfile extends Model
{
    protected $fillable = ['user_id', Constants::DBC_CLASS_ID, Constants::DBC_ACAD_SESS_ID];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'exam_datetime'];
    /**
     * Get the user that owns the candidate_profile.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * Get the user that owns the candidate_profile.
     */
    public function academic_session()
    {
        return $this->belongsTo('App\AcademicSession');
    }
    /**
     * Get the user that owns the candidate_profile.
     */
    public function academic_class()
    {
        return $this->belongsTo('App\AcademicClass');
    }
}
