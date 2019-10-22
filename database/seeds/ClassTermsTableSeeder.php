<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = '\''.now().'\'';

        DB::statement("

            INSERT INTO `class_terms` (`id`, `academic_class_id`, `academic_term_id`, `code_name`, `created_at`) VALUES
            (1, 1, 1, 'JSS-1-1', $dateNow),
            (2, 1, 2, 'JSS-1-2', $dateNow),
            (3, 1, 3, 'JSS-1-3', $dateNow),
            (4, 2, 1, 'JSS-2-1', $dateNow),
            (5, 2, 2, 'JSS-2-2', $dateNow),
            (6, 2, 3, 'JSS-2-3', $dateNow),
            (7, 3, 1, 'JSS-3-1', $dateNow),
            (8, 3, 2, 'JSS-3-2', $dateNow),
            (9, 3, 3, 'JSS-3-3', $dateNow),
            (10, 4, 1, 'SSS-1-1', $dateNow),
            (11, 4, 2, 'SSS-1-2', $dateNow),
            (12, 4, 3, 'SSS-1-3', $dateNow),
            (13, 5, 1, 'SSS-2-1', $dateNow),
            (14, 5, 2, 'SSS-2-2', $dateNow),
            (15, 5, 3, 'SSS-2-3', $dateNow),
            (16, 6, 1, 'SSS-3-1', $dateNow),
            (17, 6, 2, 'SSS-3-2', $dateNow),
            (18, 6, 3, 'SSS-3-3', $dateNow);
        ");
    }
}
