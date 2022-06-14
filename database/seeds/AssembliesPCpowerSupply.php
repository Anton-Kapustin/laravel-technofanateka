<?php

use Illuminate\Database\Seeder;

class AssembliesPCpowerSupply extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pc_power_supply')->insert([
            [
                'model' => 'ZALMAN ARX 750W [ZM750-ARX]',
                'power' => '750W',
            ],
            [
                'model' => 'ZALMAN Watttera 700W [ZM700-EBTII]',
                'power' => '700W',
            ],
        ]);
        
    }
}
