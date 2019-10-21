<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Utils\Constants;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$autoIncrement = auto_increment();

$factory->define(\App\UserStaffProfile::class, function (Faker $faker)  use ($autoIncrement)  {


    $autoIncrement->next();
    $type = Constants::DBCV_USER_TYPE_STAFF;

    $allowedGenderTypes = \App\Utils\Constants::AV_GENDER_TYPE;
    $avGenderAtRand = array_rand($allowedGenderTypes);
    $selectedUserType = $type;
    $selectedGenderType = $allowedGenderTypes[$avGenderAtRand];
    $regCodePrefix = get_reg_code_prefix($selectedUserType);
    return [
        Constants::DBC_USER_ID => factory('App\User')->create([
            'first_name' => $faker->firstName($selectedGenderType),
            'type' => $selectedUserType,
            'gender' => $selectedGenderType,
            'email' => 'staff'.$autoIncrement->current().'@test.com',
            'reg_code' => $regCodePrefix . strtoupper(Str::random(5)),
        ])->id,
    ];
});

