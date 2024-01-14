<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['article', 'research']);
            $table->string('title');
            $table->string('publish_date');
            $table->string('hijri_date');
            $table->longText('desc')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->integer('pages')->nullable();
            $table->integer('folders')->nullable()->default(0);
            $table->integer('views')->default(0);
            $table->integer('downloads')->nullable()->default(0);
            $table->json('keywords')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
