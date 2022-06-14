<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class RenameTableMotherboards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename(Config::get('db_table_name.motherboard_old'), Config::get('db_table_name.motherboard'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename(Config::get('db_table_name.motherboard'), Config::get('db_table_name.motherboard_old'));
    }
}
