<?php

use Illuminate\Database\Seeder;

class AssembliesPCcase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pc_computer_case')->insert([
            [
                'model' => 1,
                'type' => 1,
            ],
            [
                'model' => 2,
                'type' => 1,
            ],
            [
                'model' => 3,
                'type' => 2,
            ],
            [
                'model' => 4,
                'type' => 3,
            ],
            [
                'model' => 10,
                'type' => 3,
            ],
            [
                'model' => 11,
                'type' => 3,
            ],
        ]);
    }
}
