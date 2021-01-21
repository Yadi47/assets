<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('code');
            $table->string('name');
            $table->dateTime('purchase_at');
            $table->integer('purchase_price');
            $table->text('description');
            $table->boolean('status');
            $table->string('model');
            $table->text('image');
            $table->string('brand');

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('asset_part_of');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('location_id');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('asset_part_of')->references('id')->on('assets');
            $table->foreign('type_id')->references('id')->on('type');
            $table->foreign('location_id')->references('id')->on('location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
