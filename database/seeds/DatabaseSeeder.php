<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AssembliesPCcase::class,
            AssembliesPCcoller::class,
            AssembliesPCcpu::class,
            AssembliesPCmemory::class,
            AssembliesPCmotherboard::class,
            AssembliesPCpowerSupply::class,
            AssembliesPCram::class,
            AssembliesPCvideo::class,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
