<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicTerm extends Model
{
    use SoftDeletes;

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
