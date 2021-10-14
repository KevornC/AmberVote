<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBallotQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ballot_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ballot_id')->unsigned();
            $table->foreign('ballot_id')->references('id')->on('ballots');
            $table->longText('question');
            $table->integer('max_res')->default(1);
            $table->integer('min_res')->default(1);
            $table->string('desc');
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
        Schema::dropIfExists('ballot_questions');
    }
}
