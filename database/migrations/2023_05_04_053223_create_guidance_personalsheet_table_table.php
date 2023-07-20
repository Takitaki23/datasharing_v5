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
        Schema::create('guidance_personalsheet_table', function (Blueprint $table) {
            $table->id();
            // Student Info
            $table->string('birth_order');
            $table->string('blood_type');
            $table->string('dialect');
            $table->string('hobbies');
            // Father Info
            $table->date('father_birthdate');
            $table->integer('father_age');
            $table->string('father_income');
            $table->string('father_attainment');
            // Mother Info
            $table->date('mother_birthdate');
            $table->integer('mother_age');
            $table->string('mother_income');
            $table->string('mother_attainment');
            // Students Academic Info 
            $table->string('elementary_award');
            $table->string('jhs_award');
            $table->string('shs_award');
            $table->string('shs_track');
            $table->string('subject_interest');
            $table->string('organization_membership');
            $table->string('studies_finance');
            $table->string('personal_choice');
            $table->string('influence');
            $table->string('course_feelings');
            $table->string('personal_interests');  
            $table->string('enrollment_reason');  
            $table->string('school_consider');  
            // Students Behavior Information 
            $table->string('student_concern'); 
            $table->string('pysch_visit'); 
            $table->string('visit_reason'); 
            $table->string('counseling_history');
            // Personal Description
            $table->string('about_self');
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
        Schema::dropIfExists('guidance_personalsheet_table');
    }
};
