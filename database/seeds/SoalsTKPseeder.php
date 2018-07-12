<?php

use Illuminate\Database\Seeder;

class SoalsTKPseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
      for ($i=0; $i < 50; $i++) { 
        $array_diacak = array("Kat1","Kat2","Kat3","Kat4", "Kat5");
          $rand_key = array_rand($array_diacak,1);
          $subkategori = $array_diacak[$rand_key];
        
          $array_diacak = array("Mudah","Sedang","Sulit");
          $rand_key = array_rand($array_diacak,1);
          $kesulitan = $array_diacak[$rand_key];

          $array_diacak = array("B","C","D","A","E");
          shuffle($array_diacak);
          $jawaban = implode($array_diacak);

        DB::table('soals')->insert([

          'deskripsi' => str_random(10).' '.str_random(5).' '.str_random(10).' '.str_random(5).' '.str_random(10).' '.str_random(5).' '.str_random(10),
          'kategori' => 'TKP',
          'subkategori' => $subkategori,
          'kesulitan' => $kesulitan,
          'opsi1' => str_random(7),
          'opsi2' => str_random(7),
          'opsi3' => str_random(7),
          'opsi4' => str_random(7),
          'opsi5' => str_random(7),
          'jawaban' => $jawaban,
          'image' => NULL,
        ]);
      }
    }
}
