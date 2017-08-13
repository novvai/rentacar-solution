<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarBrandModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_brand_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('car_brand_id')->unsigned()->indexed();
            $table->timestamps();

            $table->foreign('car_brand_id')
                ->references('id')
                ->on('car_brands')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_brand_models');
    }
}
