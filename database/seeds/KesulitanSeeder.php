<?php

use Illuminate\Database\Seeder;

class KesulitanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kesulitans')->insert([
          'kesulitan' => 'A : Sulit',
        ]);
        DB::table('kesulitans')->insert([
          'kesulitan' => 'B : Sedang',
        ]);
        DB::table('kesulitans')->insert([
          'kesulitan' => 'C : Mudah',
        ]);
    }
}
