<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrameTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frame_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('frame_type');
            $table->integer('stock');
            $table->integer('price');
            $table->integer('id_brand')->unsigned();
            $table->foreign('id_brand')->references('id')->on('frame_brands');
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
        Schema::dropIfExists('frame_types');
    }
}
