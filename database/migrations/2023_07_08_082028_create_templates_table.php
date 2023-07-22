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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('template_name');
            $table->string('template_back');
            $table->integer('canvas_width');
            $table->integer('canvas_height');
            $table->integer('profile_w');
            $table->integer('profile_h');
            $table->integer('profile_x');
            $table->integer('profile_y');
            $table->integer('textContents_0_x');//stundent no
            $table->integer('textContents_0_y');//stundent no
            $table->string('textContents_0_fs');//stundent no
            $table->string('textContents_0_ff');//stundent no
            $table->integer('textContents_1_x');//course
            $table->integer('textContents_1_y');//course
            $table->string('textContents_1_fs');//stundent no
            $table->string('textContents_1_ff');//stundent no
            $table->integer('textContents_2_x');//last name
            $table->integer('textContents_2_y');//last name
            $table->string('textContents_2_fs');//stundent no
            $table->string('textContents_2_ff');//stundent no
            $table->integer('textContents_3_x');//first name
            $table->integer('textContents_3_y');//first name
            $table->string('textContents_3_fs');//stundent no
            $table->string('textContents_3_ff');//stundent no
            $table->integer('textContents_4_x');//middle name
            $table->integer('textContents_4_y');//middle name
            $table->string('textContents_4_fs');//stundent no
            $table->string('textContents_4_ff');//stundent no
            $table->integer('signature_w');
            $table->integer('signature_h');
            $table->integer('signature_x');
            $table->integer('signature_y');
            $table->integer('textContentsBack_0_x');//contact person
            $table->integer('textContentsBack_0_y');//contact person
            $table->string('textContentsBack_0_fs');//contact person
            $table->string('textContentsBack_0_ff');//contact person
            $table->integer('textContentsBack_1_x');//address 1
            $table->integer('textContentsBack_1_y');//address 1
            $table->string('textContentsBack_1_fs');//contact person
            $table->string('textContentsBack_1_ff');//contact person
            $table->integer('textContentsBack_2_x');//contact number
            $table->integer('textContentsBack_2_y');//contact number
            $table->string('textContentsBack_2_fs');//contact person
            $table->string('textContentsBack_2_ff');//contact person
            $table->integer('textContentsBack_3_x');//semester
            $table->integer('textContentsBack_3_y');//semester
            $table->string('textContentsBack_3_fs');//contact person
            $table->string('textContentsBack_3_ff');//contact person

            $table->string('primary_font');//middle name
            $table->string('secondary_font');//middle name
            $table->string('rgb_color_primary');//middle name
            $table->string('rgb_color_secondary');//middle name
            $table->string('rgb_color_tertiary');//middle name
            // add more later including the font
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
        Schema::dropIfExists('templates');
    }
};
