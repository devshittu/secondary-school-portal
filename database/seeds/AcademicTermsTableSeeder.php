<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("

            INSERT INTO `academic_terms` (`id`, `title`, `code_name`) VALUES
            (1, 'First', '1ST'),
            (2, 'Second', '2ND'),
            (3, 'Third', '3RD');
        ");
    }
}
