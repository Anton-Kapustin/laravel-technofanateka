<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTableVideoCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename(Config::get('db_table_name.video_card_old'), Config::get('db_table_name.video_card'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename(Config::get('db_table_name.video_card'), Config::get('db_table_name.video_card_old'));
    }
}
