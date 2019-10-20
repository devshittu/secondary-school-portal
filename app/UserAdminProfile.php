<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAdminProfile extends Model
{
    /**
     * Get the user that owns the candidate_profile.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
