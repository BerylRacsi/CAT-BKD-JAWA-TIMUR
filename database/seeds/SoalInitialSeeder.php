<?php

use Illuminate\Database\Seeder;

class SoalInitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $admin = new App\Admin;
        $admin->name = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = Hash::make('password');
        $admin->save();
        $this->call(JenisSeeder::class);
        $this->call(BidangSeeder::class);
        $this->call(KesulitanSeeder::class);
        $this->call(SubbidangSeeder::class);
        $this->call(AturanTIUSeeder::class);
        $this->call(AturanTWKSeeder::class);
        $this->call(AturanTKPSeeder::class);
    }
}
