<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name'  =>  'Admin',
            'is_admin'  =>  1,
            'mobile_number' =>  '01737603707',
            'email' =>  'razwanulghani@gmail.com',
            'password'  =>  Hash::make('12345678'),
        ]);
    }
}
