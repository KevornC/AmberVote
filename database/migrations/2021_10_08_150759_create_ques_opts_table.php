<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuesOptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ques_opts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ballot_question_id')->unsigned();
            $table->foreignId('ballot_question_id')->constrained();
            $table->longText('options');
            $table->longText('opts_desc');
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
        Schema::dropIfExists('ques_opts');
    }
}
