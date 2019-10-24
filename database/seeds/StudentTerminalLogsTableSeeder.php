<?php

use App\ClassTerm;
use App\Utils\Constants;
use Illuminate\Database\Seeder;

class StudentTerminalLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = '\'' . now() . '\'';

        $fields = array(Constants::DBC_USER_ID, Constants::DBC_ACAD_SESS_ID, Constants::DBC_CLASS_TERM_ID,);
        $query = "INSERT INTO `student_terminal_logs` (`$fields[0]`, `$fields[1]`, `$fields[2]`, `created_at`) VALUES ";


        $allStudentIds = \App\UserStudentProfile::all()->pluck('user_id');
        $allSessionIds = \App\AcademicSession::all()->pluck(Constants::DBC_REF_ID); //deeper
        $allClassTermIds = \App\ClassTerm::all()->pluck(Constants::DBC_REF_ID); //deepest





        $sessionChangerCounter = 1;
        $oldJ = 0;
        $newJ = 0;


        for ($i = 0; $i < count($allStudentIds); $i++) {
            for ($j = 0; $j < count($allSessionIds); $j++) {


                for ($k = 0; $k < count($allClassTermIds); $k++) {
                    if ($sessionChangerCounter > count($allSessionIds)) {
                        $j += 1;
                        $oldJ = $j;
                        $sessionChangerCounter = 1;
                        if ($oldJ > count($allSessionIds) - 1) {
                            $j = 0;
                        }
                    }

                    $forSessionId = (int)$allSessionIds[$j];

                    $forStudentId = (int)$allStudentIds[$i];
                    $forClassTermId = (int)$allClassTermIds[$k];

//                    echo ("<br> StudentId: " .$forStudentId . " SessionId: " . $forSessionId .  " ClassTermId: " . $forClassTermId. '<br>');
                    $query .= "($forStudentId, $forSessionId, $forClassTermId, $dateNow),";
//                    echo( $query);
                    $sessionChangerCounter += 1;
                }

            }
        }



        /*
        $sessionChangerCounter = 1;
        for ($i = 0; $i < count($allStudentIds); $i++) {
            for ($k = 0; $k < count($allClassTermIds); $k++) {
                for ($j = 0; $j < count($allSessionIds); $j++) {

                    $forSessionId = (int)$allSessionIds[$j];
                    $sessionChangerCounter += 1;
                    if ($sessionChangerCounter >= 3) {
                        $sessionChangerCounter = 0;
                        $j += 1;
                        $forSessionId = (int)$allSessionIds[$j + 1];

                        break;
                    }
                    $forStudentId = (int)$allStudentIds[$i];
                    $forClassTermId = (int)$allClassTermIds[$k];

                    $query .= "($forStudentId, $forSessionId, $forClassTermId, $dateNow),";
//                    dump( $query);
                }
            }
        }*/
        $query = substr($query, 0, -1);

        $query .= ";";


        DB::statement($query);

    }
}
