<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class_id = \App\Utils\Constants::DBC_ACAD_CLASS_ID;
        $subject_id = \App\Utils\Constants::DBC_ACAD_SUBJECT_ID;
        $dateNow = '\''.now().'\'';

        DB::statement("

            INSERT INTO `class_subject` (`$class_id`, `$subject_id`, `created_at`) VALUES
            (1, 1, $dateNow),
            (1, 2, $dateNow),
            (1, 3, $dateNow),
            (1, 4, $dateNow),
            (1, 5, $dateNow),
            (2, 1, $dateNow),
            (2, 2, $dateNow),
            (2, 3, $dateNow),
            (2, 4, $dateNow),
            (2, 5, $dateNow),
            (3, 1, $dateNow),
            (3, 2, $dateNow),
            (3, 3, $dateNow),
            (3, 4, $dateNow),
            (3, 5, $dateNow),
            (4, 1, $dateNow),
            (4, 2, $dateNow),
            (4, 6, $dateNow),
            (4, 7, $dateNow),
            (4, 8, $dateNow),
            (5, 1, $dateNow),
            (5, 2, $dateNow),
            (5, 6, $dateNow),
            (5, 7, $dateNow),
            (5, 8, $dateNow),
            (6, 1, $dateNow),
            (6, 2, $dateNow),
            (6, 6, $dateNow),
            (6, 7, $dateNow),
            (6, 8, $dateNow);
        ");
    }
}
