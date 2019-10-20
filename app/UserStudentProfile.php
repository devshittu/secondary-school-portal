<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStudentProfile extends Model
{

    /**
     * Get the user that owns the student_profile.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
