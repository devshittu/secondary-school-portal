<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->char('code_name', 3)->unique(true);
            $table->enum('category', Constants::AV_SUBJECT_CAT)->default(Constants::DBCV_SUBJECT_CAT_GEN)->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_subjects');
    }
}
