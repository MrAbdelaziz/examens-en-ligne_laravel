<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateSubcategoriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->string('tags');
            $table->unsignedBigInteger('parent');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('parent')->references('id')->on('categories');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('subcategories');
    }
}
