<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = '\''.now().'\'';
        $dateNow = '\''.now().'\'';
        $lastAcadSessionId = DB::table('academic_sessions')->latest('id')->first()->id;
//        dump('$lastAcadSessionId:// ',$lastAcadSessionId);

        DB::statement("

            INSERT INTO `system_settings` (`id`, `school_name`, `academic_term_id`, `academic_session_id`, `created_at`) VALUES
            (1, 'Laravel Group of Schools', 1, $lastAcadSessionId, $dateNow);
            
        ");
    }
}
