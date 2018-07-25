<?php

use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis')->insert([
          'jenis' => 'TIU',
        ]);
        DB::table('jenis')->insert([
          'jenis' => 'TWK',
        ]);
        DB::table('jenis')->insert([
          'jenis' => 'TKP',
        ]);
    }
}
