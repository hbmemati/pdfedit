<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Ali',
            'email'=>'ali@gmail.com',
            'password'=>bcrypt('aliALİ'),
            'admin'=>true,
            'active'=>true
        ]);
    }
}
