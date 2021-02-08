<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountermeasureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countermeasure', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('countermeasure_code');
            $table->string('countermeasure_name');
            $table->text('descrition')->nullable();
            $table->text('remarks')->nullable();
            $table->text('other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countermeasure');
    }
}
