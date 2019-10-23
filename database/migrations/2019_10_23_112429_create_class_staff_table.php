<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger(Constants::DBC_USER_ID)->index();
            $table->unsignedInteger(Constants::DBC_ACAD_SESS_ID)->index();
            $table->unsignedInteger(Constants::DBC_ACAD_CLASS_ID)->index();
            $table->foreign(Constants::DBC_USER_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign(Constants::DBC_ACAD_SESS_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('academic_sessions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign(Constants::DBC_ACAD_CLASS_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('academic_classes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('class_staff');
    }
}
