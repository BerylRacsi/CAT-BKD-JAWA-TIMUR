<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Faker\Generator as Faker;

class SoalsTIUseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      $bidang_id_array = array(1 , 2 , 3);

      for ($i = 0 ; $i < 9 ; $i++) { 

        $subbidang_id_array[$i] = $i+1;

      }

      for ($i=0; $i < 1000; $i++) { 
          
          $rand_key = array_rand($bidang_id_array,1);
          $bidang_id = $bidang_id_array[$rand_key];

          $rand_key = array_rand($subbidang_id_array,1);
          $subbidang_id = $subbidang_id_array[$rand_key];

          // $kesulitan_id_array = array(1 , 2 , 3);
          // $rand_key = array_rand($kesulitan_id_array,1);
          // $kesulitan = $kesulitan_id_array[$rand_key];

          $jawaban = array("B","C","D","A","E");
          $rand_key = array_rand($jawaban,1);
          $jawaban = $jawaban[$rand_key];

        DB::table('soals')->insert([

          'deskripsi' => str_random(10).' '.str_random(5).' '.str_random(10).' '.str_random(5).' '.str_random(10).' '.str_random(5).' '.str_random(10),
          'jenis_id' => 1,
          'bidang_id' => $bidang_id,
          'subbidang_id' => $subbidang_id,
          'kesulitan_id' => 2,
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
