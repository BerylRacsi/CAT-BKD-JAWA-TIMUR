<?php

use Illuminate\Database\Seeder;

class SoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SoalsTIUseeder::class);
        $this->call(SoalsTWKseeder::class);
        $this->call(SoalsTKPseeder::class);
    }
}
