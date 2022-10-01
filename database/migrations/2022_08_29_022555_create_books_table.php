<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('cover')->nullable();
            $table->date('publication_date');
            $table->integer('total_pages');
            $table->string('isbn');
            $table->text('description');
            $table->integer('max_quantity');
            $table->integer('availability');

            $table->foreignId('collection_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('publisher_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('writer_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();

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