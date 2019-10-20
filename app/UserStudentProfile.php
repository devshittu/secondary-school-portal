<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStudentProfile extends Model
{
    protected $fillable = ['user_id', 'has_paid'];

    /**
     * Get the user that owns the student_profile.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
