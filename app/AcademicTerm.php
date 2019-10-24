<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicTerm extends Model
{

    /**
     * Get the current system settings that owns the setting.
     */
    public function system_setting()
    {
        return $this->hasOne('App\SystemSetting');
    }

    public function class_term()
    {
        return $this->hasMany(ClassTerm::class);
    }

}
