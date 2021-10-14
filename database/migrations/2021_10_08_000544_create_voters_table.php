<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->string('voter_nm');
            $table->foreignId('election_id')->constrained();
            $table->string('email');
            $table->string('valid_id')->nullable();
            $table->string('unique_id')->unique();
            $table->string('unique_key')->unique();
            $table->string('phone_num');
            $table->string('v_code');
            $table->boolean('hasVoted')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(array('election_id', 'valid_id'), 'election_valid_id');
            $table->unique(array('election_id', 'email'), 'election_email');
            $table->unique(array('election_id', 'phone_num'), 'election_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voters');
    }
}
