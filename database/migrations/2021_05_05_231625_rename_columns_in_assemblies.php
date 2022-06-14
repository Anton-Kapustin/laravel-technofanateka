<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInAssemblies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assemble', function (Blueprint $table) {
            $table->renameColumn(Config::get('db_assemble_column_name.motherboard_old'), Config::get('db_assemble_column_name.motherboard'));
            $table->renameColumn(Config::get('db_assemble_column_name.cpu_old'), Config::get('db_assemble_column_name.cpu'));
            $table->renameColumn(Config::get('db_assemble_column_name.ram_old'), Config::get('db_assemble_column_name.ram'));
            $table->renameColumn(Config::get('db_assemble_column_name.ssd_old'), Config::get('db_assemble_column_name.ssd'));
            $table->renameColumn(Config::get('db_assemble_column_name.cooller_old'), Config::get('db_assemble_column_name.cooller'));
            $table->renameColumn(Config::get('db_assemble_column_name.power_supply_old'), Config::get('db_assemble_column_name.power_supply'));
            $table->renameColumn(Config::get('db_assemble_column_name.pc_case_old'), Config::get('db_assemble_column_name.pc_case'));
            $table->renameColumn(Config::get('db_assemble_column_name.video_card_old'), Config::get('db_assemble_column_name.video_card'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assemble', function (Blueprint $table) {
            $table->renameColumn(Config::get('db_assemble_column_name.motherboard'), Config::get('db_assemble_column_name.motherboard_old'));
            $table->renameColumn(Config::get('db_assemble_column_name.cpu'), Config::get('db_assemble_column_name.cpu_old'));
            $table->renameColumn(Config::get('db_assemble_column_name.ram'), Config::get('db_assemble_column_name.ram_old'));
            $table->renameColumn(Config::get('db_assemble_column_name.ssd'), Config::get('db_assemble_column_name.ssd_old'));
            $table->renameColumn(Config::get('db_assemble_column_name.cooller'), Config::get('db_assemble_column_name.cooller_old'));
            $table->renameColumn(Config::get('db_assemble_column_name.power_supply'), Config::get('db_assemble_column_name.power_supply_old'));
            $table->renameColumn(Config::get('db_assemble_column_name.pc_case'), Config::get('db_assemble_column_name.pc_case_old'));
            $table->renameColumn(Config::get('db_assemble_column_name.video_card'), Config::get('db_assemble_column_name.video_card_old'));
        });
    }
}
