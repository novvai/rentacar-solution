<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_brand_model_id')->unsigned()->indexed();
            $table->string('release_date');
            $table->integer('car_color_id')->unsigned()->indexed();
            $table->integer('doors')->unsigned();
            $table->integer('car_transmission_id')->unsigned()->indexed();
            $table->timestamps();

            $table->foreign('car_brand_model_id')
                ->references('id')
                ->on('car_brand_models')
                ->onDelete('cascade');

            $table->foreign('car_color_id')
                ->references('id')
                ->on('car_colors')
                ->onDelete('cascade');

            $table->foreign('car_transmission_id')
                ->references('id')
                ->on('car_transmissions')
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
        Schema::dropIfExists('cars');
    }
}
