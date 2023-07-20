<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guidance_exit_interview_table', function (Blueprint $table) {
            $table->id();
            $table->string('year_graduated');
            $table->string('continue_education');
            $table->string('institution');
            $table->string('degree_seek');
            $table->string('working_position');
            $table->string('employers_name');
            $table->string('job_title');
            $table->integer('employers_contact');
            $table->string('current_position');
            $table->string('seek_employment');
            $table->string('csa_approval');
            $table->string('csa_need');
            $table->string('plan'); 
            $table->string('rate_institution'); 
            $table->string('career_aspect'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guidance_exit_interview_table');
    }
};
