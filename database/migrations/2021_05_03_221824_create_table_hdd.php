<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Config::get('db_table_name.hdd'), function (Blueprint $table) {
            $table->increments('id');
            $table->string(Config::get('db_hdd_column_name.model'))->default("0");
            $table->string(Config::get('db_hdd_column_name.form_factor'))->default("0");
            $table->string(Config::get('db_hdd_column_name.size'))->default("0");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('db_table_name.hdd'));
    }
}
