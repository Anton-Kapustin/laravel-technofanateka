<?php

use Illuminate\Database\Seeder;

class AssembliesPCmotherboard extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pc_motherboard')->insert([
            [
                'model' => 'MSI Z390 MPG GAMING PLUS',
                'support' => '2xPCI-Ex16, аудио 7.1',
                'ddr' => 'DDR4',
                'ram_frequency' => 4400,
            ],
            [
                'model' => 'GIGABYTE Z390 D',
                'support' => '3xPCI-Ex16, аудио 7.1',
                'ddr' => 'DDR4',
                'ram_frequency' => 4266,
            ],
            [
                'model' => 'MSI Z390 MPG GAMING EDGE AC',
                'support' => '3xPCI-Ex16, аудио 7.1',
                'ddr' => 'DDR4',
                'ram_frequency' => 4400,
            ],
        ]);
    }
}
