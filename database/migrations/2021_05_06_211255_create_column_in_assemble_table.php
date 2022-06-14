<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnInAssembleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Config::get('db_table_name.assemble'), function (Blueprint $table) {
            $table->string(Config::get('db_assemble_column_name.hdd'), 50)->default("0");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Config::get('db_table_name.assemble'), function (Blueprint $table) {
            $table->dropColumn(Config::get('db_assemble_column_name.hdd'));
        });    
    }
}
