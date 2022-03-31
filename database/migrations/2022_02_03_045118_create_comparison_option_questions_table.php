<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComparisonOptionQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparison_option_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comparison_test_id')->constrained();
            $table->text('question_body');
            $table->foreignId('comparison_option_answer_id')->constrained();
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
        Schema::dropIfExists('comparison_option_questions');
    }
}
