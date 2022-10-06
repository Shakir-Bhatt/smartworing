<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_listings', function (Blueprint $table) {
            $table->string('uuid')->primary();
            $table->string('county')->nullable();
            $table->string('country')->nullable();
            $table->string('town')->nullable();
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('postcode')->nullable();
            $table->string('image_full')->nullable();
            $table->string('image_thumbnail')->nullable();
            $table->integer('num_bedrooms')->nullable();
            $table->integer('num_bathrooms')->nullable();
            $table->float('price',15,2)->default(0.00);
            $table->enum('for',['sale','rent'])->nullable();
            $table->integer('property_type_id');
            $table->timestamps();

            $table->foreign('property_type_id')->references('id')->on('property_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_listings');
    }
}
