<?php

use App\Utils\Constants;
use Illuminate\Database\Seeder;

class ClassStaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = '\''.now().'\'';

        $fields = array(Constants::DBC_USER_ID, Constants::DBC_ACAD_SESS_ID, Constants::DBC_ACAD_CLASS_ID, );


        DB::statement("

            INSERT INTO `class_staff` (`$fields[0]`, `$fields[1]`, `$fields[2]`, `created_at`) VALUES
            (8, 3, 1, $dateNow),
            (9, 2, 2, $dateNow),
            (10, 1, 3, $dateNow),
            (11, 1, 4, $dateNow),
            (12, 2, 5, $dateNow),
            (13, 3, 6, $dateNow),
            (11, 3, 6, $dateNow);
        ");
//        --give another class to another staff
    }
}
