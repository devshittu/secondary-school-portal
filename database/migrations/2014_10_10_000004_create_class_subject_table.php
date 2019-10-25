<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_subject', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger(Constants::DBC_ACAD_CLASS_ID)->index();
            $table->unsignedInteger(Constants::DBC_ACAD_SUBJECT_ID)->index();
//            $table->char(Constants::DBC_CODE_NAME, 10)->unique();

            $table->foreign(Constants::DBC_ACAD_CLASS_ID)
                ->references( Constants::DBC_REF_ID)
                ->on('academic_classes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign(Constants::DBC_ACAD_SUBJECT_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('academic_subjects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('class_subject');
    }
}
