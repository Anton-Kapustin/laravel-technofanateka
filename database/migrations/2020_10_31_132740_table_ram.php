<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_ram', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model')->default("0");
            $table->string('ddr')->default("0");
            $table->string('ram')->default("0");
            $table->string('frequency')->default("0");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pc_ram');
    }
}
