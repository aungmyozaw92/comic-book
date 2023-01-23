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
        Schema::create('comic_books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('author');
            $table->string('artist');
            $table->longText('description');
            $table->string('image');
            $table->decimal('rating', 16, 2)->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_recommend')->default(false);
            $table->boolean('is_banner')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comic_books');
    }
};
