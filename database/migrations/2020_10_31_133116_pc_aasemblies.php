<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PcAasemblies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_assemblies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->default("Game");
            $table->string('preview_image')->default("0");
            $table->string('price')->default("0");
            $table->integer('pc_cpu_id')->default(1);
            $table->integer('pc_motherboards_id')->default(1);
            $table->integer('pc_video_id')->default(1);
            $table->integer('pc_ram_id')->default(1);
            $table->integer('pc_memory_id')->default(1);
            $table->integer('pc_power_supply_id')->default(1);
            $table->integer('pc_cooller_id')->default(1);
            $table->integer('pc_computer_case_id')->default(1);
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
        Schema::dropIfExists('pc_assemblies');
    }
}
