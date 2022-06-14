<?php

use Illuminate\Database\Seeder;

class AssembliesPCvideo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pc_video')->insert([
            [
                'model' => 'Palit GeForce GTX 1660 SUPER Gaming Pro',
                'memory' => '6Gb',
            ],
            [
                'model' => 'KFA2 GeForce GTX 1650 Super EX',
                'memory' => '4Gb',
            ],
            [
                'model' => 'KFA2 GeForce RTX 2070 Super EX',
                'memory' => '8Gb',
            ],
        ]);
    }
}
