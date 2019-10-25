<?php

use App\ClassSubject;
use App\Utils\Constants;
use Illuminate\Database\Seeder;

class StudentTerminalLogSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = '\'' . now() . '\'';

        $fields = array(Constants::DBC_STD_TERMINAL_LOG_ID, Constants::DBC_ACAD_SUBJECT_ID, Constants::DBC_CA_EXAM_SCORE, Constants::DBC_CA_TEST_SCORE,);
        $query = "INSERT INTO `student_terminal_log_subjects` (`$fields[0]`, `$fields[1]`, `$fields[2]`, `$fields[3]`, `created_at`) VALUES ";


        $allStudentTerminalLogIds = \App\StudentTerminalLog::all()->pluck(Constants::DBC_REF_ID);

        for ($i = 0; $i < count($allStudentTerminalLogIds); $i++) {
            $allStudentTerminalLogs = \App\StudentTerminalLog::whereId($allStudentTerminalLogIds[$i])->first();
            $allClassSubjectIds = ClassSubject::where(Constants::DBC_ACAD_CLASS_ID, $allStudentTerminalLogs->class_term->academic_class_id)
                ->get()
                ->pluck(Constants::DBC_ACAD_SUBJECT_ID);
            for ($j = 0; $j < count($allClassSubjectIds); $j++) {

                $allStudentTerminalLogId = (int)$allStudentTerminalLogIds[$i];
                $allClassSubjectId = (int)$allClassSubjectIds[$j];
                $caTest = rand(4, 30);
                $caExam = rand(15, 70);

                $query .= "($allStudentTerminalLogId, $allClassSubjectId, $caExam, $caTest, $dateNow),";
            }
        }

/*

        $sessionChangerCounter = 1;
        $oldJ = 0;
        $newJ = 0;


        for ($i = 0; $i < count($allStudentTerminalLogIds); $i++) {
            for ($j = 0; $j < count($allSessionIds); $j++) {

                    $forSessionId = (int)$allSessionIds[$j];

                    $allStudentTerminalLogId = (int)$allStudentTerminalLogIds[$i];
                    $forClassTermId = (int)$allClassTermIds[$k];
                    $caTest = rand(4, 30);
                    $caExam = rand(15, 70);

                    $query .= "($allStudentTerminalLogId, $forSessionId, $caTest, $caExam $dateNow),";
            }
        }*/



        $query = substr($query, 0, -1);

        $query .= ";";


        DB::statement($query);
    }
}
