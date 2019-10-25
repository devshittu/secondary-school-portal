<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTerminalLogSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_terminal_log_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger(Constants::DBC_STD_TERMINAL_LOG_ID)->index()->nullable();
            $table->unsignedInteger(Constants::DBC_ACAD_SUBJECT_ID)->index()->nullable();
            $table->unsignedTinyInteger(Constants::DBC_CA_TEST_SCORE)->index()->nullable();
            $table->unsignedTinyInteger(Constants::DBC_CA_EXAM_SCORE)->index()->nullable();

            $table->foreign(Constants::DBC_STD_TERMINAL_LOG_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('student_terminal_logs')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign(Constants::DBC_ACAD_SUBJECT_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('academic_subjects')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_terminal_log_subjects');
    }
}
