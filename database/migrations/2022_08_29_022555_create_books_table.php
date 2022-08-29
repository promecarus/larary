<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('cover');
            $table->year('publication_year');
            $table->integer('total_pages');
            $table->integer('isbn');
            $table->text('description');
            $table->integer('max_quantity');
            $table->integer('availability');

            $table->foreignId('writer_id');
            $table->foreignId('publisher_id');
            $table->foreignId('collection_id');
            $table->foreignId('genre_id');

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
        Schema::dropIfExists('books');
    }
};