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
            $table->foreignId('ballot_question_id')->constrained();
            $table->longText('option');
            $table->string('photo')->nullable();
            $table->longText('opts_desc');
            $table->bigInteger('total_vote')->unsigned()->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('ques_opts');
    }
}
