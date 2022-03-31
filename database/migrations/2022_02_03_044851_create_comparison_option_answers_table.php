<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComparisonOptionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparison_option_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comparison_test_id')->constrained();
            $table->text('answer_body');
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
        Schema::dropIfExists('comparison_option_answers');
    }
}
