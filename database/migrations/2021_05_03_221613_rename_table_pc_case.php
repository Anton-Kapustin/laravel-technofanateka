<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTablePcCase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename(Config::get('db_table_name.pc_case_old'), Config::get('db_table_name.pc_case'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename(Config::get('db_table_name.pc_case'), Config::get('db_table_name.pc_case_old'));
    }
}
