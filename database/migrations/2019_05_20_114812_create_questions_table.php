<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateQuestionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content_area_one')->nullable();
            $table->text('content_area_two')->nullable();
            $table->bigInteger('nbr_answers');
            $table->bigInteger('question_order');
            $table->unsignedBigInteger('exam_of_question');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('exam_of_question')->references('id')->on('exams')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('questions');
    }
}
