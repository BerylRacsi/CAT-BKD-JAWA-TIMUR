<?php

use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidangs')->insert([
          'bidang' => 'Verbal',
          'jenis_id' => 1,
        ]);
        DB::table('bidangs')->insert([
          'bidang' => 'Kuantitatif',
          'jenis_id' => 1,
        ]);
        DB::table('bidangs')->insert([
          'bidang' => 'Penalaran',
          'jenis_id' => 1,
        ]);
        
        DB::table('bidangs')->insert([
          'bidang' => 'Ideologi',
          'jenis_id' => 2,
          ]);

        DB::table('bidangs')->insert([
          'bidang' => 'Politik',
          'jenis_id' => 2,
          ]);

        DB::table('bidangs')->insert([
          'bidang' => 'Ekonomi',
          'jenis_id' => 2,
          ]);

        DB::table('bidangs')->insert([
          'bidang' => 'Sosial & Budaya',
          'jenis_id' => 2,
          ]);

        DB::table('bidangs')->insert([
          'bidang' => 'Pertahanan & Keamanan',
          'jenis_id' => 2,
          ]);

        DB::table('bidangs')->insert([
          'bidang' => 'Hukum',
          'jenis_id' => 2,
        ]);


        DB::table('bidangs')->insert([
          'bidang' => 'Adaptasi',
          'jenis_id' => 3,
        ]);
        DB::table('bidangs')->insert([
          'bidang' => 'Pengendalian Diri',
          'jenis_id' => 3,
        ]);
        DB::table('bidangs')->insert([
          'bidang' => 'Semangat Berprestasi',
          'jenis_id' => 3,
        ]);
        DB::table('bidangs')->insert([
          'bidang' => 'Integritas',
          'jenis_id' => 3,
        ]);
        DB::table('bidangs')->insert([
          'bidang' => 'Inisiatif',
          'jenis_id' => 3,
        ]);
    }
}
