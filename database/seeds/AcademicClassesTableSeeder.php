<?php

use Illuminate\Database\Seeder;

class AcademicClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("

            INSERT INTO `academic_classes` (`id`, `title`, `code_name`) VALUES
            (1, 'Junior Secondary School One', 'JSS-1'),
            (2, 'Junior Secondary School Two', 'JSS-2'),
            (3, 'Junior Secondary School One', 'JSS-3'),
            (4, 'Senior Secondary School One', 'SSS-1'),
            (5, 'Senior Secondary School Two', 'SSS-2'),
            (6, 'Senior Secondary School One', 'SSS-3');
        ");
    }
}
