<?php

use App\Utils\Constants;
use Illuminate\Database\Seeder;

class UserStudentTransitionLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = '\''.now().'\'';

        $fields = array(Constants::DBC_USER_ID, Constants::DBC_ACAD_SESS_ID, Constants::DBC_CLASS_TERM_ID, );


        DB::statement("

            INSERT INTO `user_student_transition_logs` (`$fields[0]`, `$fields[1]`, `$fields[2]`, `created_at`) VALUES
            (13, 1, 1, $dateNow),
            (13, 1, 2, $dateNow),
            (13, 1, 3, $dateNow),
            (13, 2, 4, $dateNow),
            (13, 2, 5, $dateNow),
            (13, 2, 6, $dateNow),
            (13, 3, 7, $dateNow),
            (13, 3, 8, $dateNow),
            (13, 3, 9, $dateNow),
            (14, 1, 1, $dateNow),
            (14, 1, 2, $dateNow),
            (14, 1, 3, $dateNow),
            (14, 2, 4, $dateNow),
            (14, 2, 5, $dateNow),
            (14, 2, 6, $dateNow),
            (14, 3, 7, $dateNow),
            (14, 3, 8, $dateNow),
            (14, 3, 9, $dateNow),
        ");
    }
}
