<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $usersRecord = [
            [
                'fullName' => 'M Hannan',
                'email'=> 'user@user.com',
                'userType'=> 'user',
                'isActivated'=> '0',
                'socialType'=> 'socialType',
                'password'=>Hash::make('12345678'),
            ]
        ];
        DB::table('users')->insert($usersRecord);
    }
}
