<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("

            INSERT INTO `academic_subjects` (`id`, `title`, `code_name`, `category`) VALUES
            ('1', 'English', 'ENG', 'general'),
            ('2', 'Mathematics', 'MTH', 'general'),
            ('3', 'Social Studies', 'SCS', 'junior_general'),
            ('4', 'Home Economics', 'HEC', 'junior_general'),
            ('5', 'Integrated Science', 'ITG', 'junior_general'),
            ('6', 'Biology', 'BIO', 'science'),
            ('7', 'Economics', 'ECO', 'commercial'),
            ('8', 'Literature', 'LIT', 'art'),
            ('9', 'Commerce', 'COM', 'commercial');
        ");
    }
}
