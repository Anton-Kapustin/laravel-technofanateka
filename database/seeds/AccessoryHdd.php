<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AccessoryHdd extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hdd')->insert([

            [
                'id' => 0,
                'model' => 'None',
                'form_factor' => 'None',
                'size' => 'None',
            ],

            [
                'model' => 'WD Purple 1Tb [WD10PURZ]',
                'form_factor' => 'Sata 3',
                'size' => '1Tb',
            ],

            [
                'model' => 'WD Purple 2Tb [WD20PURZ]',
                'form_factor' => 'Sata 3',
                'size' => '2Tb',
            ],
            
            [
                'model' => 'WD Purple 3Tb [WD30PURZ]',
                'form_factor' => 'Sata 3',
                'size' => '3Tb',
            ],
            
            [
                'model' => 'WD Purple 4Tb [WD40PURZ]',
                'form_factor' => 'Sata 3',
                'size' => '4Tb',
            ],
            
            [
                'model' => 'WD Purple 6Tb [WD60PURZ]',
                'form_factor' => 'Sata 3',
                'size' => '6Tb',
            ],
            


        ]);
    }
}
