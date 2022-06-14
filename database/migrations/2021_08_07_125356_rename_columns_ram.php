<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsRam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ram', function (Blueprint $table) {
            $table->renameColumn('ddr', 'type_ram');
            $table->renameColumn('ram', 'size');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ram', function (Blueprint $table) {
            $table->renameColumn('type_ram', 'ddr');
            $table->renameColumn('size', 'ram');
        });
    }
}
