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
      for ($i=0; $i < 50; $i++) { 
        # code...
        DB::table('soals')->insert([

          'deskripsi' => str_random(10).' '.str_random(5).' '.str_random(10).' '.str_random(5).' '.str_random(10).' '.str_random(5).' '.str_random(10).' '.str_random(5).' '.str_random(10).' '.str_random(5).' '.str_random(10).' '.str_random(5),
          'kategori' => 'TKP',
          'opsi1' => str_random(7),
          'opsi2' => str_random(7),
          'opsi3' => str_random(7),
          'opsi4' => str_random(7),
          'opsi5' => str_random(7),
          'jawaban' => 'C',
          'image' => str_random(20), 

        ]);
      }
    }
}
