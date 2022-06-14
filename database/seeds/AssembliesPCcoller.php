<?php

use Illuminate\Database\Seeder;

class AssembliesPCcoller extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pc_cooller')->insert([
            [
                'model' => 'GamerStorm Assassin III [DP-GS-MCH7-ASN-3]',
                'rpm' => '1400',
            ],
            [
                'model' => 'Noctua NH-D15',
                'rpm' => '1500',
            ],
        ]);
        

    }
}
