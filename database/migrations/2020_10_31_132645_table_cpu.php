<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCpu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_cpu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model')->default("0");
            $table->string('family')->default("0");
            $table->string('socket')->default("0");
            $table->integer('frequency')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pc_cpu');
    }
}
