<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('tags');
            // Внешний ключ для читателя
            $table->unsignedBigInteger('reader_id')->nullable();
            $table->foreign('reader_id')->references('id')->on('readers');
            // Внешний ключ для категорий
            $table->unsignedBigInteger('category_id')->default(1);
            $table->foreign('category_id')->references('id')->on('category');
            // Внешний ключ для полок
            $table->unsignedBigInteger('shelf_id')->default(1);
            $table->foreign('shelf_id')->references('id')->on('shelf');

            $table->date('taken_date');

            $table->binary('photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
