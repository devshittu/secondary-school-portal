<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger(Constants::DBC_CLASS_ID)->index();
            $table->unsignedInteger(Constants::DBC_ACAD_TERM_ID)->index();
            $table->char(Constants::DBC_CODE_NAME, 10)->unique();

            $table->foreign(Constants::DBC_CLASS_ID)
                ->references( Constants::DBC_REF_ID)
                ->on('classes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign(Constants::DBC_ACAD_TERM_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('academic_terms')
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
        Schema::dropIfExists('class_terms');
    }
}
