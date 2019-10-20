<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserCandidateProfile;
use App\Utils\Constants;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

$factory->define(UserCandidateProfile::class, function (Faker $faker) {
    $type = Constants::DBCV_USER_TYPE_CANDIDATE;

    $allowedGenderTypes = \App\Utils\Constants::AV_GENDER_TYPE;
    $avGenderAtRand = array_rand($allowedGenderTypes);
    $selectedUserType = $type;
    $selectedGenderType = $allowedGenderTypes[$avGenderAtRand];
    $regCodePrefix = getRegCodePrefix($selectedUserType);
//    $lastAcadSessionId = \App\AcademicSession::max('id')->id;
    $lastAcadSessionId = DB::table('system_settings')->latest('id')->first();
    $currentSessionId = \App\SystemSetting::find(1)->academic_session_id;
    return [
        Constants::DBC_USER_ID => factory('App\User')->create([
            'first_name' => $faker->firstName($selectedGenderType),
            'type' => $selectedUserType,
            'gender' => $selectedGenderType,
            'reg_code' => $regCodePrefix . strtoupper(Str::random(5)),
        ])->id,
        Constants::DBC_CLASS_ID => 1,
        Constants::DBC_ACAD_SESS_ID => $currentSessionId,
    ];
});
