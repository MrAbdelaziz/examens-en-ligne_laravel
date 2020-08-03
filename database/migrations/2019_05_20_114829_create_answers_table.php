<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAnswersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content')->nullable();
            $table->boolean('is_correct_answer')->default(false);
            $table->bigInteger('answers_order');
            $table->unsignedBigInteger('question_of_answer');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('question_of_answer')->references('id')->on('questions')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('answers');
    }
}
