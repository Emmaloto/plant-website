<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReCreatePlantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ArboretumPlants', function (Blueprint $table) {
            $table->increments('PlantID');
            $table->string('Scientific_Name');
            $table->string('Common_Name');
            $table->string('Family');
            $table->string('Other_Name') -> nullable();
            $table->integer('GroupID');
            $table->integer('FlowerID');
            $table->text('Description');
            $table->string('Images');
            $table->integer('user_id');
            $table->string('Credit_links') -> nullable();
            $table->string('Useful_links') -> nullable();
            //$table->multiLineString('Credit_links');
            //$table->multiLineString('Useful_links');
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
        Schema::dropIfExists('plant');
    }
}
