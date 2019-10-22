<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); //JSS1-SSS3
            $table->char('code_name', 6)->unique(true);
            $table->boolean(Constants::DBC_CAN_APPLY)->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_classes');
    }
}
