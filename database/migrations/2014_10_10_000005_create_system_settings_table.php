<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string(Constants::DBC_SCHOOL_NAME);
            $table->unsignedInteger(Constants::DBC_ACAD_SESS_ID)->index();
            $table->unsignedInteger(Constants::DBC_ACAD_TERM_ID)->index();

            $table->foreign(Constants::DBC_ACAD_SESS_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('academic_sessions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign(Constants::DBC_ACAD_TERM_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('academic_terms')
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
        Schema::dropIfExists('system_settings');
    }
}
