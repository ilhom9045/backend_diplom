<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleAnswerTestAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_answer_test_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("multiple_answer_test_id")->constrained();
            $table->string('answer_body');
            $table->boolean('is_true');
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
        Schema::dropIfExists('multiple_answer_test_answers');
    }
}
