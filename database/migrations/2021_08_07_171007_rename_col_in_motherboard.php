<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColInMotherboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motherboard', function (Blueprint $table) {
            $table->renameColumn('ddr', 'type_ram');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motherboard', function (Blueprint $table) {
            $table->renameColumn('type_ram', 'ddr');
        });
    }
}
