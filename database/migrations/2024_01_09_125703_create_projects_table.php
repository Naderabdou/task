<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table ->string('name_ar');
            $table ->string('name_en');
            $table ->string('description_ar');
            $table ->string('description_en');
            $table ->string('image');
            $table->string('address');
            $table->string('lat');
            $table->string('lng');
            $table->string('units');
            $table->string('building_area');
            $table->string('land_area');
            $table->string('projects_sector');
            $table->string('date_created');
            $table->string('aesthetic_space');
            $table->string('project_services');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table ->enum('status',['active','inactive'])->default('inactive');


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
        Schema::dropIfExists('projects');
    }
}
