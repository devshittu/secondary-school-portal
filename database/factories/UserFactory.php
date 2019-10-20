<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$autoIncrement = autoIncrement();

$factory->define(User::class, function (Faker $faker) use ($autoIncrement) {
    $autoIncrement->next();
    $allowedUserTypes = \App\Utils\Constants::AV_USER_TYPE;
    $avAtRand = array_rand($allowedUserTypes);
    $allowedGenderTypes = \App\Utils\Constants::AV_GENDER_TYPE;
    $avGenderAtRand = array_rand($allowedGenderTypes);
    $selectedUserType = $allowedUserTypes[$avAtRand];
    $selectedGenderType = $allowedGenderTypes[$avGenderAtRand];
//    dump('$selectedUserType:// ', $selectedUserType);
    $regCodePrefix = getRegCodePrefix($selectedUserType);
//    dump('$regCodePrefix:// ', $regCodePrefix);

    return [
        'first_name' => $faker->firstName($selectedGenderType),
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
        'type' => $selectedUserType,
        'gender' => $selectedGenderType,
        'reg_code' => $regCodePrefix . strtoupper(Str::random(10)),
    ];
});

function autoIncrement(){
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}

function getRegCodePrefix($userType) {
    $prefix = '';
    switch ($userType) {
        case \App\Utils\Constants::DBCV_USER_TYPE_ADMIN:
            $prefix = 'ADM';
            break;
        case \App\Utils\Constants::DBCV_USER_TYPE_CANDIDATE:
            $prefix = 'CND';
            break;
        case \App\Utils\Constants::DBCV_USER_TYPE_STAFF:
            $prefix = 'STF';
            break;
        case \App\Utils\Constants::DBCV_USER_TYPE_STUDENT:
            $prefix = 'STD';
            break;

    }
    return $prefix . '_';
}
