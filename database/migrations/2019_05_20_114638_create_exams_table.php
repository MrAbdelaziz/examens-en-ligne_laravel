<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateExamsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('tags')->nullable();
            $table->text('cover')->nullable();
            $table->bigInteger('number_questions');
            $table->bigInteger('duration')->nullable();
            $table->bigInteger('minimum_score')->default('50');
            $table->unsignedBigInteger('author');
            $table->unsignedBigInteger('subcategory');
            $table->boolean('is_completed_writing')->default(false);
            $table->bigInteger('status')->default('2');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('author')->references('id')->on('users');
            $table->foreign('subcategory')->references('id')->on('subcategories');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('exams');
    }
}
