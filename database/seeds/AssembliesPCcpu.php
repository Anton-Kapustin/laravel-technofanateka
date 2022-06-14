<?php

use Illuminate\Database\Seeder;

class AssembliesPCcpu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pc_cpu')->insert([
            [
                'model' => 'Intel Core i3-9100F',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '3600',
            ],
            [
                'model' => 'Intel Core i3-9100F graphics',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '3600',
            ],
            [
                'model' => 'Intel Core i5-9400F',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '2900',
            ],
            [
                'model' => 'Intel Core i5-9400 graphics',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '2900',
            ],
            [
                'model' => 'Intel Core i5-9500F',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '3000',
            ],
            [
                'model' => 'Intel Core i5-9500 graphics',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '3000',
            ],
            [
                'model' => 'Intel Core i5-9600KF',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '3700',
            ],
            [
                'model' => 'Intel Core i5-9600K graphics',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '3700',
            ],
            [
                'model' => 'Intel Core i7-9700KF',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '3600',
            ],
            [
                'model' => 'Intel Core i7-9700K graphics',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '3600',
            ],
            [
                'model' => 'Intel Core i9-9900KF',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '3100',
            ],
            [
                'model' => 'Intel Core i9-9900 graphics',
                'family' => 'intel',
                'socket' => 'LGA 1151-v2',
                'frequency' => '3100',
            ],
			[
                'model' => 'Intel Core i3-10100F',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '3600',
            ],
            [
                'model' => 'Intel Core i3-10100  graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '3600',
            ],
            [
                'model' => 'Intel Core i3-10320  graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '3800',
            ],
            [
                'model' => 'Intel Core i5-10400F',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '2900',
            ],
            [
                'model' => 'Intel Core i5-10400  graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '2900',
            ],
            [
                'model' => 'Intel Core i5-10500  graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '3100',
            ],
            [
                'model' => 'Intel Core i5-10600  graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '3300',
            ],
            [
                'model' => 'Intel Core i5-10600KF',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '4100',
            ],
            [
                'model' => 'Intel Core i5-10600K  graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '4100',
            ],
            [
                'model' => 'Intel Core i7-10700F',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '2900',
            ],
            [
                'model' => 'Intel Core i7-10700  graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '2900',
            ],
            [
                'model' => 'Intel Core i7-10700KF',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '3800',
            ],
            [
                'model' => 'Intel Core i7-10700K graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '3800',
            ],
            [
                'model' => 'Intel Core i9-10900F',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '2800',
            ],
            [
                'model' => 'Intel Core i9-10900 graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '2800',
            ],
            [
                'model' => 'Intel Core i9-10850K graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '3600',
            ],
            [
                'model' => 'Intel Core i9-10900 graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '2800',
            ],
            [
                'model' => 'Intel Core i9-10900KF',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '3700',
            ],
            [
                'model' => 'Intel Core i9-10900K graphics',
                'family' => 'intel',
                'socket' => 'LGA 1200',
                'frequency' => '3700',
            ],
        ]);
    }
}
