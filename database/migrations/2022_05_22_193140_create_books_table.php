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
            $table->string('title', 255);
            $table->integer('price')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('pages_num')->unsigned();
            $table->string('isbn', 13);
            $table->text('description');
            $table->text('description_author')->nullable();
            $table->text('cover_path');
            $table->date('published_at');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->timestamp('created_at');
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
