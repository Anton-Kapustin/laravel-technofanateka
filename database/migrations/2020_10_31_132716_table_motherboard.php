<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMotherboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_motherboard', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model')->default("0");
            $table->string('support')->default("0");
            $table->string('ddr')->default("0");
            $table->string('ram_frequency')->default("0");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pc_motherboard');
    }
}
