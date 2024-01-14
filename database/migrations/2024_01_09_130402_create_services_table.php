<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table ->string('name_ar')->unique();
            $table ->string('name_en')->unique();
            $table ->string('description_ar');
            $table ->string('description_en');
            $table ->enum('status',['active','inactive'])->default('inactive');

            $table ->string('image');
           //foreign key
         //   $table->unsignedBigInteger('service_category_id');
          //  $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('cascade');
            $table->foreignId('service_category_id')->constrained('service_categories')->references('id')->onDelete('cascade');

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
        Schema::dropIfExists('services');
    }
}
