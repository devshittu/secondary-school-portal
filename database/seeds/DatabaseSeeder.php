<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        $this->call(ClassesTableSeeder::class);
        $this->call(AcademicSessionsTableSeeder::class);
        $this->call(AcademicTermsTableSeeder::class);
        $this->call(ClassTermsTableSeeder::class);
        $this->call(SystemSettingsTableSeeder::class);

        factory('App\UserAdminProfile', 2)->create();
        factory('App\UserCandidateProfile', 5)->create();
//        factory('App\Source', 20)->create();
//        factory('App\Story', 200)->create();

    }
}
