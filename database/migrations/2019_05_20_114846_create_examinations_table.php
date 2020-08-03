<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateExaminationsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('examinations', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->dropPrimary("id");
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('exam_id');
            // $table->primary(['user_id','exam_id']);
            $table->bigInteger('registration_status')->default('2');
            $table->timestamp('possible_start_exam_date');
            $table->timestamp('start_date')->nullable();
            $table->bigInteger('nbr_incorrect_answers')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamp('limit_start_exam_date')->nullable();
            $table->double('score', 5, 2)->nullable();
            $table->bigInteger('certification_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('examinations');
    }
}
