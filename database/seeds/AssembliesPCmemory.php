<?php

use Illuminate\Database\Seeder;

class AssembliesPCmemory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pc_memory')->insert([
            [
                'model' => 'Samsung 970 EVO Plus M.2 [MZ-V7S500BW]',
                'size' => '500GB',
                'memory_type' => 'm2',
            ],
            [
                'model' => 'Samsung 970 EVO Plus M.2 [MZ-V7S1T0BW]',
                'size' => '1024GB',
                'memory_type' => 'm2',
            ],
        ]);

    }
}
